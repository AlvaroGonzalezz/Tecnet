<?php
include '../../conexion.php';

$id_a = $_POST['id_alumno'];
$id_m = $_POST['id_materia'];

$query = mysqli_query($conexion, "SELECT * FROM calificaciones 
                                  WHERE id_alumno = '$id_a' 
                                  AND id_materia = '$id_m' LIMIT 1");

if (mysqli_num_rows($query) > 0) {
    $datos = mysqli_fetch_assoc($query);
    echo json_encode($datos); // Enviamos todos los campos (parcial1, parcial2, etc.)
} else {
    echo json_encode(null);
}
?>