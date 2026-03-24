<?php
require "../../conexion.php";
$accion = $_POST['accion'];

if ($accion == 'nuevo') {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre_carrera']);
    $sql = "INSERT INTO carreras (nombre_carrera) VALUES ('$nombre')";
    echo mysqli_query($conexion, $sql) ? "success" : mysqli_error($conexion);
}

if ($accion == 'eliminar') {
    $id = $_POST['id_carrera'];
      
    $sql = "DELETE FROM carreras WHERE id_carrera = $id";
    echo mysqli_query($conexion, $sql) ? "success" : "error";
}
?>