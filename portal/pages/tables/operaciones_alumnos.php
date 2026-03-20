<?php
require "../../conexion.php";
if ($_POST['accion'] == 'editar_gestion') {
    $id = $_POST['id_alumno'];
    $estado = $_POST['estado'];
    $id_grupo = !empty($_POST['id_grupo']) ? $_POST['id_grupo'] : "NULL";
    $sql = "UPDATE alumno SET estado = '$estado', id_grupo = $id_grupo WHERE id_alumno = $id";
    echo mysqli_query($conexion, $sql) ? "success" : "error";
}
