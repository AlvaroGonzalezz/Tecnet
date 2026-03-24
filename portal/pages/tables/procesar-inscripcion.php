<?php
  
ob_start();
include '../../conexion.php';

  
$id_materia = mysqli_real_escape_string($conexion, $_POST['id_materia']);
$id_docente = mysqli_real_escape_string($conexion, $_POST['id_docente']);
$id_alumno  = mysqli_real_escape_string($conexion, $_POST['id_alumno']);
$periodo    = mysqli_real_escape_string($conexion, $_POST['periodo']);

if (empty($id_materia) || empty($id_alumno)) {
    ob_end_clean();
    echo "Faltan datos obligatorios.";
    exit;
}

  
$check = mysqli_query($conexion, "SELECT id_inscripcion FROM inscripciones 
                                  WHERE id_alumno = '$id_alumno' 
                                  AND id_materia = '$id_materia' 
                                  AND periodo = '$periodo'");

if (mysqli_num_rows($check) > 0) {
    ob_end_clean();
    echo "Ya registrado";   
    exit;
}

  
$sql = "INSERT INTO inscripciones (id_alumno, id_materia, id_docente, periodo) 
        VALUES ('$id_alumno', '$id_materia', '$id_docente', '$periodo')";

if (mysqli_query($conexion, $sql)) {
    ob_end_clean();   
    echo "success";   
} else {
    ob_end_clean();
    echo "Error: " . mysqli_error($conexion);
}
?>