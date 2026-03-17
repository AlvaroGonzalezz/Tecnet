<?php
require "../../conexion.php";

// Capturamos la acción (nuevo, editar, eliminar)
$accion = $_POST['accion'] ?? '';

if ($accion == 'nuevo') {
    // Captura de datos del formulario
    $nombre      = $_POST['nombre'];
    $apellido    = $_POST['apellido'];
    $area        = $_POST['area'];
    $correo      = $_POST['correo'];
    $telefono    = $_POST['telefono']; // Asegúrate de tener este campo en el form
    $usuario     = $_POST['usuario'];
    $id_rol      = $_POST['id_rol'];
    $pass_cifrada = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

    // --- LÓGICA DE LA IMAGEN ---
    $nombre_foto = "default.png"; // Imagen por defecto si no suben nada

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        // Creamos un nombre único: Ej. 1700000000_alvaro.jpg
        $nombre_foto = time() . "_" . $usuario . "." . $extension;

        // IMPORTANTE: Verifica que esta ruta exista en tu servidor
        $ruta_destino = "../../dist/img/perfiles/" . $nombre_foto;

        if (!move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_destino)) {
            echo "Error al subir la imagen al servidor.";
            exit;
        }
    }
    // ---------------------------

    $conexion->begin_transaction();

    try {
        // 1. Insertar en tabla ADMINISTRATIVO (Incluimos telefono y foto)
        $sqlA = "INSERT INTO administrativo (nombre, apellido, correo, area, telefono, foto) VALUES (?, ?, ?, ?, ?, ?)";
        $stmtA = $conexion->prepare($sqlA);
        // "ssssss" indica que los 6 parámetros son strings
        $stmtA->bind_param("ssssss", $nombre, $apellido, $correo, $area, $telefono, $nombre_foto);
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
        // Si hay error en la DB y se subió una foto, podrías eliminarla aquí si quisieras (opcional)
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
        // 1. Obtener la foto actual por si necesitamos borrarla o mantenerla
        $queryFoto = "SELECT foto FROM administrativo WHERE id_administrativo = ?";
        $stmtFoto = $conexion->prepare($queryFoto);
        $stmtFoto->bind_param("i", $id);
        $stmtFoto->execute();
        $resFoto = $stmtFoto->get_result();
        $filaFoto = $resFoto->fetch_assoc();
        $nombre_foto = $filaFoto['foto']; // Mantenemos la foto actual por defecto

        // 2. ¿Subió una foto nueva?
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $nuevo_nombre_foto = time() . "_" . $id . "." . $extension;
            $ruta_destino = "../../dist/img/perfiles/" . $nuevo_nombre_foto;

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_destino)) {
                // Si subió la nueva con éxito, borramos la vieja (siempre que no sea la default)
                if ($nombre_foto != "default.png" && file_exists("../../dist/img/perfiles/" . $nombre_foto)) {
                    unlink("../../dist/img/perfiles/" . $nombre_foto);
                }
                $nombre_foto = $nuevo_nombre_foto;
            }
        }

        // 3. Actualizamos tabla administrativo (incluida la foto)
        $sqlA = "UPDATE administrativo SET nombre=?, apellido=?, correo=?, area=?, telefono=?, foto=? WHERE id_administrativo=?";
        $stmtA = $conexion->prepare($sqlA);
        $stmtA->bind_param("ssssssi", $nombre, $apellido, $correo, $area, $telefono, $nombre_foto, $id);
        $stmtA->execute();

        // 4. NOTA: En la tabla 'usuarios' NO hay columna 'correo' según tu esquema.
        // Si quieres actualizar el nombre de usuario, añade ese campo aquí. 
        // Si no, esta parte se queda solo con la actualización de administrativo.

        $conexion->commit();
        echo "success";
    } catch (Exception $e) {
        $conexion->rollback();
        echo "Error: " . $e->getMessage();
    }
    exit;
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
