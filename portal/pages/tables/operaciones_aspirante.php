<?php
error_reporting(0);
require "../../conexion.php";

$accion = $_POST['accion'];

if ($accion == 'admitir') {
    $id = $_POST['id_aspirante'];
    $conexion->begin_transaction();

    try {
        // 1. Obtener datos completos del aspirante
        $stmtA = $conexion->prepare("SELECT * FROM aspirantes WHERE id_aspirante = ?");
        $stmtA->bind_param("i", $id);
        $stmtA->execute();
        $asp = $stmtA->get_result()->fetch_assoc();

        if (!$asp) throw new Exception("Aspirante no encontrado.");

        // 2. Insertar en tabla 'alumno' (Incluyendo id_carrera)
        $sqlAl = "INSERT INTO alumno (nombre, apellido, curp, fecha_nacimiento, direccion, telefono, correo, fotografia, id_carrera, estado) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtAl = $conexion->prepare($sqlAl);

        $estado = "Activo";
        $foto = ($asp['foto']) ? $asp['foto'] : "default.png";
        $carrera = $asp['id_carrera_opcion1']; // Mantenemos su elección

        $stmtAl->bind_param(
            "ssssssssis",
            $asp['nombre'],
            $asp['apellido'],
            $asp['curp'],
            $asp['fecha_nacimiento'],
            $asp['direccion'],
            $asp['telefono'],
            $asp['correo'],
            $foto,
            $carrera,
            $estado
        );
        $stmtAl->execute();
        $id_nuevo_alumno = $conexion->insert_id;

        // 3. Crear acceso en 'usuarios' (Password inicial = CURP)
        $pass = password_hash($asp['curp'], PASSWORD_DEFAULT);
        $rol_alumno = 2;

        $sqlUs = "INSERT INTO usuarios (usuario, contraseña, id_rol, id_alumno) VALUES (?, ?, ?, ?)";
        $stmtUs = $conexion->prepare($sqlUs);
        $stmtUs->bind_param("ssii", $asp['correo'], $pass, $rol_alumno, $id_nuevo_alumno);
        $stmtUs->execute();

        // 4. Limpiar tabla aspirantes
        $conexion->query("DELETE FROM aspirantes WHERE id_aspirante = $id");

        $conexion->commit();
        echo "success";
    } catch (Exception $e) {
        $conexion->rollback();
        echo "Error: " . $e->getMessage();
    }
    exit;
}
if ($accion == 'eliminar') {
    $id = $_POST['id_aspirante'];

    try {
        // 1. Consultar si tiene una foto asignada para borrarla físicamente
        $stmtFoto = $conexion->prepare("SELECT foto FROM aspirantes WHERE id_aspirante = ?");
        $stmtFoto->bind_param("i", $id);
        $stmtFoto->execute();
        $resultado = $stmtFoto->get_result();

        if ($fila = $resultado->fetch_assoc()) {
            $nombre_foto = $fila['foto'];
            // Borramos el archivo si no es el default
            if ($nombre_foto != "default.png" && !empty($nombre_foto)) {
                $ruta_foto = "../../dist/img/perfiles/" . $nombre_foto;
                if (file_exists($ruta_foto)) {
                    unlink($ruta_foto);
                }
            }
        }

        // 2. Eliminar el registro de la base de datos
        $stmtDel = $conexion->prepare("DELETE FROM aspirantes WHERE id_aspirante = ?");
        $stmtDel->bind_param("i", $id);

        if ($stmtDel->execute()) {
            echo "success";
        } else {
            throw new Exception($conexion->error);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    exit;
}
