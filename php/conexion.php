<?php 
$conexion = new mysqli("localhost", "root", "", "tecnet");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>