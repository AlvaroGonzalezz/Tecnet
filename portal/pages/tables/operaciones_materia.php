<?php
require "../../conexion.php";
$accion = $_POST['accion'];

// Caso Nuevo
if ($accion == 'nuevo') {
    $nombre   = $_POST['nombre_materia'];
    $semestre = $_POST['semestre'];
    $creditos = $_POST['creditos'];
    $id_docente = $_POST['id_docente'];
    
    $sql = "INSERT INTO materias (nombre_materia, semestre, creditos, id_docente) VALUES ('$nombre', '$semestre', '$creditos', '$id_docente')";
    echo mysqli_query($conexion, $sql) ? "success" : "error";
}

// Caso Editar
if ($accion == 'editar') {
    $id       = $_POST['id_materia'];
    $nombre   = $_POST['nombre_materia'];
    $semestre = $_POST['semestre'];
    $creditos = $_POST['creditos'];

    $id_docente = $_POST['id_docente'];
    $sql = "UPDATE materias SET nombre_materia='$nombre', semestre='$semestre', creditos='$creditos', id_docente='$id_docente' WHERE id_materia='$id'";
    echo mysqli_query($conexion, $sql) ? "success" : "error";
}

// Caso Eliminar
if ($accion == 'eliminar') {
    $id = $_POST['id_materia'];
    $sql = "DELETE FROM materias WHERE id_materia = $id";
    echo mysqli_query($conexion, $sql) ? "success" : "error";
}
