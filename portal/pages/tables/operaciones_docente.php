<?php
error_reporting(0);
require "../../conexion.php";

$accion = $_POST['accion'] ?? '';
$conexion->begin_transaction();

try {
    // --- ACCIÓN: NUEVO ---
    if ($accion == 'nuevo') {
        $nombre      = $_POST['nombre'];
        $apellido    = $_POST['apellido'];
        $correo      = $_POST['correo'];
        $telefono    = $_POST['telefono'];
        $usuario     = $_POST['usuario'];
        $id_rol      = $_POST['id_rol']; 
        $pass_hash   = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

        // 1. Insertar en docente (Aquí SÍ hay correo)
        $sqlD = "INSERT INTO docente (nombre, apellido, correo, telefono) VALUES (?, ?, ?, ?)";
        $stmtD = $conexion->prepare($sqlD);
        $stmtD->bind_param("ssss", $nombre, $apellido, $correo, $telefono);
        $stmtD->execute();
        
        $id_docente_nuevo = $conexion->insert_id;

        // 2. Insertar en usuarios (Aquí NO hay correo, usamos id_docente)
        $sqlU = "INSERT INTO usuarios (usuario, contraseña, id_rol, id_docente) VALUES (?, ?, ?, ?)";
        $stmtU = $conexion->prepare($sqlU);
        $stmtU->bind_param("ssii", $usuario, $pass_hash, $id_rol, $id_docente_nuevo);
        $stmtU->execute();

        $conexion->commit();
        echo "success";
    }

    // --- ACCIÓN: EDITAR ---
    elseif ($accion == 'editar') {
        $id_docente = $_POST['id_docente'];
        $nombre     = $_POST['nombre'];
        $apellido   = $_POST['apellido'];
        $correo     = $_POST['correo'];
        $telefono   = $_POST['telefono'];

        // Solo actualizamos la tabla docente. 
        // En la tabla usuarios no hay nada que cambiar (a menos que cambies el login)
        $sqlD = "UPDATE docente SET nombre=?, apellido=?, correo=?, telefono=? WHERE id_docente=?";
        $stmtD = $conexion->prepare($sqlD);
        $stmtD->bind_param("ssssi", $nombre, $apellido, $correo, $telefono, $id_docente);
        $stmtD->execute();

        $conexion->commit();
        echo "success";
    }

    // --- ACCIÓN: ELIMINAR ---
    elseif ($accion == 'eliminar') {
        $id_docente = $_POST['id_docente'];

        // 1. Borrar de usuarios usando id_docente (que SÍ existe)
        $sqlU = "DELETE FROM usuarios WHERE id_docente = ?";
        $stmtU = $conexion->prepare($sqlU);
        $stmtU->bind_param("i", $id_docente);
        $stmtU->execute();

        // 2. Borrar de docente
        $sqlD = "DELETE FROM docente WHERE id_docente = ?";
        $stmtD = $conexion->prepare($sqlD);
        $stmtD->bind_param("i", $id_docente);
        $stmtD->execute();

        $conexion->commit();
        echo "success";
    }

} catch (Exception $e) {
    $conexion->rollback();
    echo "Error: " . $e->getMessage();
}

$conexion->close();
?>