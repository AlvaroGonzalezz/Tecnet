<?php
require "../../conexion.php";
$accion = $_POST['accion'];

if ($accion == 'nuevo') {
    $semestre = $_POST['semestre'];
    $id_carrera = $_POST['id_carrera'];
    $sql = "INSERT INTO grupo (semestre, id_carrera) VALUES ('$semestre', '$id_carrera')";
    echo mysqli_query($conexion, $sql) ? "success" : mysqli_error($conexion);
}

if ($accion == 'eliminar') {
    $id = $_POST['id_grupo'];
    $sql = "DELETE FROM grupo WHERE id_grupo = $id";
    echo mysqli_query($conexion, $sql) ? "success" : "error";
}
?>