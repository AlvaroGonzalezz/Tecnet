<?php
include '../../conexion.php';
$id_m = $_POST['id_materia'];

$q = mysqli_query($conexion, "SELECT a.id_alumno, a.nombre, a.apellido 
                              FROM inscripciones i 
                              INNER JOIN alumno a ON i.id_alumno = a.id_alumno 
                              WHERE i.id_materia = '$id_m'");

echo '<option value="">Seleccione un alumno...</option>';
while($r = mysqli_fetch_assoc($q)) {
    echo "<option value='{$r['id_alumno']}'>{$r['apellido']} {$r['nombre']}</option>";
}