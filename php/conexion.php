<?php 
$conexion = new mysqli("localhost", "root", "", "sistema_escolar");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>