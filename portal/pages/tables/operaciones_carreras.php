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
    // El motor de la base de datos impedirá borrar si hay llaves foráneas activas en 'grupos'
    $sql = "DELETE FROM carreras WHERE id_carrera = $id";
    echo mysqli_query($conexion, $sql) ? "success" : "error";
}
?>