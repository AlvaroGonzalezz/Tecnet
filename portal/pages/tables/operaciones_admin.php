<?php
require "../../conexion.php";

  
$accion = $_POST['accion'] ?? '';

if ($accion == 'nuevo') {
      
    $nombre      = $_POST['nombre'];
    $apellido    = $_POST['apellido'];
    $area        = $_POST['area'];
    $correo      = $_POST['correo'];
    $telefono    = $_POST['telefono'];   
    $usuario     = $_POST['usuario'];
    $id_rol      = $_POST['id_rol'];
    $pass_cifrada = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

      
    $nombre_foto = "default.png";   

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
          
        $nombre_foto = time() . "_" . $usuario . "." . $extension;

          
        $ruta_destino = "../../dist/img/perfiles/" . $nombre_foto;

        if (!move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_destino)) {
            echo "Error al subir la imagen al servidor.";
            exit;
        }
    }
      

    $conexion->begin_transaction();

    try {
          
        $sqlA = "INSERT INTO administrativo (nombre, apellido, correo, area, telefono, foto) VALUES (?, ?, ?, ?, ?, ?)";
        $stmtA = $conexion->prepare($sqlA);
          
        $stmtA->bind_param("ssssss", $nombre, $apellido, $correo, $area, $telefono, $nombre_foto);
        $stmtA->execute();

          
        $id_admin_generado = $conexion->insert_id;

          
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
  
if ($accion == 'editar') {
    $id       = $_POST['id_administrativo'];
    $nombre   = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $area     = $_POST['area'];
    $correo   = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $conexion->begin_transaction();
    try {
          
        $queryFoto = "SELECT foto FROM administrativo WHERE id_administrativo = ?";
        $stmtFoto = $conexion->prepare($queryFoto);
        $stmtFoto->bind_param("i", $id);
        $stmtFoto->execute();
        $resFoto = $stmtFoto->get_result();
        $filaFoto = $resFoto->fetch_assoc();
        $nombre_foto = $filaFoto['foto'];   

          
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $nuevo_nombre_foto = time() . "_" . $id . "." . $extension;
            $ruta_destino = "../../dist/img/perfiles/" . $nuevo_nombre_foto;

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_destino)) {
                  
                if ($nombre_foto != "default.png" && file_exists("../../dist/img/perfiles/" . $nombre_foto)) {
                    unlink("../../dist/img/perfiles/" . $nombre_foto);
                }
                $nombre_foto = $nuevo_nombre_foto;
            }
        }

          
        $sqlA = "UPDATE administrativo SET nombre=?, apellido=?, correo=?, area=?, telefono=?, foto=? WHERE id_administrativo=?";
        $stmtA = $conexion->prepare($sqlA);
        $stmtA->bind_param("ssssssi", $nombre, $apellido, $correo, $area, $telefono, $nombre_foto, $id);
        $stmtA->execute();

          
          
          

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
          
        $sqlU = "DELETE FROM usuarios WHERE id_administrativo = ?";
        $stmtU = $conexion->prepare($sqlU);
        $stmtU->bind_param("i", $id);
        $stmtU->execute();

          
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
