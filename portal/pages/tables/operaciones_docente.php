<?php
error_reporting(0);
require "../../conexion.php";

$accion = $_POST['accion'] ?? '';
$conexion->begin_transaction();

try {
    // --- ACCIÓN: NUEVO ---
    if ($accion == 'nuevo') {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $usuario = $_POST['usuario'];
        $id_rol = $_POST['id_rol'];
        $pass = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

        $nombre_foto = "default.png";

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $nombre_foto = time() . "_docente." . $ext;
            $ruta = "../../dist/img/perfiles/" . $nombre_foto;
            move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
        }

        $conexion->begin_transaction();
        try {
            $sqlD = "INSERT INTO docente (nombre, apellido, correo, telefono, foto) VALUES (?, ?, ?, ?, ?)";
            $stmtD = $conexion->prepare($sqlD);
            $stmtD->bind_param("sssss", $nombre, $apellido, $correo, $telefono, $nombre_foto);
            $stmtD->execute();

            $id_doc = $conexion->insert_id;

            $sqlU = "INSERT INTO usuarios (usuario, contraseña, id_rol, id_docente) VALUES (?, ?, ?, ?)";
            $stmtU = $conexion->prepare($sqlU);
            $stmtU->bind_param("ssii", $usuario, $pass, $id_rol, $id_doc);
            $stmtU->execute();

            $conexion->commit();
            echo "success";
        } catch (Exception $e) {
            $conexion->rollback();
            echo "Error: " . $e->getMessage();
        }
        exit;
    }

    // --- ACCIÓN: EDITAR ---
    elseif ($accion == 'editar') {
        $id       = $_POST['id_docente'];
        $nombre   = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo   = $_POST['correo'];
        $telefono = $_POST['telefono'];

        $conexion->begin_transaction();
        try {
            $queryFoto = "SELECT foto FROM docente WHERE id_docente = ?";
            $stmtFoto = $conexion->prepare($queryFoto);
            $stmtFoto->bind_param("i", $id);
            $stmtFoto->execute();
            $resFoto = $stmtFoto->get_result();
            $filaFoto = $resFoto->fetch_assoc();
            $nombre_foto = $filaFoto['foto'];

            if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
                $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                $nuevo_nombre = time() . "_doc_" . $id . "." . $extension;
                $ruta_destino = "../../dist/img/perfiles/" . $nuevo_nombre;

                if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_destino)) {
                    if ($nombre_foto != "default.png" && file_exists("../../dist/img/perfiles/" . $nombre_foto)) {
                        unlink("../../dist/img/perfiles/" . $nombre_foto);
                    }
                    $nombre_foto = $nuevo_nombre;
                }
            }

            $sqlD = "UPDATE docente SET nombre=?, apellido=?, correo=?, telefono=?, foto=? WHERE id_docente=?";
            $stmtD = $conexion->prepare($sqlD);
            $stmtD->bind_param("sssssi", $nombre, $apellido, $correo, $telefono, $nombre_foto, $id);
            $stmtD->execute();

            $conexion->commit();
            echo "success";
        } catch (Exception $e) {
            $conexion->rollback();
            echo "Error: " . $e->getMessage();
        }
        exit;
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
