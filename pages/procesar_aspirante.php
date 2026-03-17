<?php
require "conexion.php";

$correo           = $_POST['correo'];
$curp             = $_POST['curp'];
$id_carrera       = $_POST['id_carrera_opcion1'];
$nombre           = $_POST['nombre'];
$apellido         = $_POST['apellido'];
$telefono         = $_POST['telefono'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$direccion        = $_POST['direccion'];
$fecha_registro   = date('Y-m-d');


$sql = "INSERT INTO aspirantes (correo, curp, id_carrera_opcion1, nombre, apellido, telefono, fecha_nacimiento, direccion, fecha_registro) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param(
    "ssissssss",
    $correo,
    $curp,
    $id_carrera,
    $nombre,
    $apellido,
    $telefono,
    $fecha_nacimiento,
    $direccion,
    $fecha_registro
);

if ($stmt->execute()) {
    $ultimo_id = $conexion->insert_id;
    header("Location: ficha_pago.php?id=$ultimo_id");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conexion->close();
