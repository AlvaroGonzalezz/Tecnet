<?php
include '../../conexion.php';

// Capturamos los datos básicos
$id_a = $_POST['id_alumno'];
$id_m = $_POST['id_materia'];
$final = !empty($_POST['final']) ? $_POST['final'] : "NULL";
$promedio = !empty($_POST['promedio']) ? $_POST['promedio'] : "0";

// Limpiamos y preparamos los 7 parciales
$p1 = ($_POST['parcial1'] !== "") ? $_POST['parcial1'] : "NULL";
$p2 = ($_POST['parcial2'] !== "") ? $_POST['parcial2'] : "NULL";
$p3 = ($_POST['parcial3'] !== "") ? $_POST['parcial3'] : "NULL";
$p4 = ($_POST['parcial4'] !== "") ? $_POST['parcial4'] : "NULL";
$p5 = ($_POST['parcial5'] !== "") ? $_POST['parcial5'] : "NULL";
$p6 = ($_POST['parcial6'] !== "") ? $_POST['parcial6'] : "NULL";
$p7 = ($_POST['parcial7'] !== "") ? $_POST['parcial7'] : "NULL";

// PASO 1: Verificar si ya existe una calificación para este alumno en esta materia
$check = mysqli_query($conexion, "SELECT id_calificacion FROM calificaciones WHERE id_alumno = '$id_a' AND id_materia = '$id_m'");

if (mysqli_num_rows($check) > 0) {
    // PASO 2: Si existe, ejecutamos el UPDATE
    $sql = "UPDATE calificaciones SET 
                parcial1 = $p1, 
                parcial2 = $p2, 
                parcial3 = $p3, 
                parcial4 = $p4, 
                parcial5 = $p5, 
                parcial6 = $p6, 
                parcial7 = $p7, 
                final = $final, 
                promedio = $promedio 
            WHERE id_alumno = '$id_a' AND id_materia = '$id_m'";
} else {
    // PASO 3: Si no existe, ejecutamos el INSERT inicial
    $sql = "INSERT INTO calificaciones (id_alumno, id_materia, parcial1, parcial2, parcial3, parcial4, parcial5, parcial6, parcial7, final, promedio) 
            VALUES ('$id_a', '$id_m', $p1, $p2, $p3, $p4, $p5, $p6, $p7, $final, $promedio)";
}

// Ejecución final
if (mysqli_query($conexion, $sql)) {
    echo "success";
} else {
    echo "Error: " . mysqli_error($conexion);
}
