<?php
require "../../conexion.php";

// Capturamos la acción (nuevo, editar, eliminar)
$accion = $_POST['accion'] ?? '';

if ($accion == 'nuevo') {
    $nombre      = $_POST['nombre'];
    $apellido    = $_POST['apellido'];
    $area        = $_POST['area'];
    $correo      = $_POST['correo'];
    $usuario     = $_POST['usuario'];
    $id_rol      = $_POST['id_rol']; 
    $pass_cifrada = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

    $conexion->begin_transaction();

    try {
        // 1. Insertar en tabla ADMINISTRATIVO
        $sqlA = "INSERT INTO administrativo (nombre, apellido, correo, area) VALUES (?, ?, ?, ?)";
        $stmtA = $conexion->prepare($sqlA);
        $stmtA->bind_param("ssss", $nombre, $apellido, $correo, $area);
        $stmtA->execute();
        
        // Obtener el ID generado para este administrativo
        $id_admin_generado = $conexion->insert_id;

        // 2. Insertar en tabla USUARIOS usando el ID anterior
        $sqlU = "INSERT INTO usuarios (usuario, contraseña, id_rol, id_administrativo) VALUES (?, ?, ?, ?)";
        $stmtU = $conexion->prepare($sqlU);
        $stmtU->bind_param("ssii", $usuario, $pass_cifrada, $id_rol, $id_admin_generado);
        $stmtU->execute();

        $conexion->commit();
        echo "success";
    } catch (Exception $e) {
        $conexion->rollback();
        echo "Error: " . $e->getMessage();
    }
    exit;
}
// ... después del bloque de 'nuevo' ...
if ($accion == 'editar') {
    $id       = $_POST['id_administrativo'];
    $nombre   = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $area     = $_POST['area'];
    $correo   = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $conexion->begin_transaction();
    try {
        // Actualizamos tabla administrativo
        $sqlA = "UPDATE administrativo SET nombre=?, apellido=?, correo=?, area=?, telefono=? WHERE id_administrativo=?";
        $stmtA = $conexion->prepare($sqlA);
        $stmtA->bind_param("sssssi", $nombre, $apellido, $correo, $area, $telefono, $id);
        $stmtA->execute();

        // Actualizamos el correo en la tabla usuarios también para mantener consistencia
        $sqlU = "UPDATE usuarios SET correo=? WHERE id_administrativo=?";
        $stmtU = $conexion->prepare($sqlU);
        $stmtU->bind_param("si", $correo, $id);
        $stmtU->execute();

        $conexion->commit();
        echo "success";
    } catch (Exception $e) {
        $conexion->rollback();
        echo "Error: " . $e->getMessage();
    }
}
if ($accion == 'eliminar') {
    $id = $_POST['id_administrativo'];

    $conexion->begin_transaction();

    try {
        // 1. Primero borramos el usuario (porque tiene la FK id_administrativo)
        $sqlU = "DELETE FROM usuarios WHERE id_administrativo = ?";
        $stmtU = $conexion->prepare($sqlU);
        $stmtU->bind_param("i", $id);
        $stmtU->execute();

        // 2. Luego borramos al administrativo
        $sqlA = "DELETE FROM administrativo WHERE id_administrativo = ?";
        $stmtA = $conexion->prepare($sqlA);
        $stmtA->bind_param("i", $id);
        $stmtA->execute();

        $conexion->commit();
        echo "success";
    } catch (Exception $e) {
        $conexion->rollback();
        echo "Error: " . $e->getMessage();
    }
    exit;
}
?>