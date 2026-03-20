<?php
require "conexion.php";

// Captura de datos de texto
$correo           = $_POST['correo'];
$curp             = $_POST['curp'];
$id_carrera       = $_POST['id_carrera_opcion1'];
$nombre           = $_POST['nombre'];
$apellido         = $_POST['apellido'];
$telefono         = $_POST['telefono'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$direccion        = $_POST['direccion'];
$fecha_registro   = date('Y-m-d');

// --- LÓGICA DE LA FOTOGRAFÍA ---
$nombre_foto = "default.png"; // Valor por defecto

if (isset($_FILES['fotografia']) && $_FILES['fotografia']['error'] === 0) {
    $extension = pathinfo($_FILES['fotografia']['name'], PATHINFO_EXTENSION);
    // Usamos la CURP para que el nombre sea único y fácil de identificar
    $nombre_foto = $curp . "_" . time() . "." . $extension;
    $ruta_destino = "dist/img/perfiles/" . $nombre_foto;

    // Intentar mover el archivo
    if (!move_uploaded_file($_FILES['fotografia']['tmp_name'], $ruta_destino)) {
        // Si falla la subida, podrías decidir si detener el proceso o seguir con la default
        $nombre_foto = "default.png";
    }
}

// Actualizamos el SQL para incluir el campo 'foto' (que es como se llama en tu tabla aspirantes)
$sql = "INSERT INTO aspirantes (correo, curp, id_carrera_opcion1, nombre, apellido, telefono, fecha_nacimiento, direccion, fecha_registro, foto) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);

// Ahora son 10 parámetros: 9 strings y 1 entero (en la posición de id_carrera) -> "ssisssssss"
$stmt->bind_param(
    "ssisssssss",
    $correo,
    $curp,
    $id_carrera,
    $nombre,
    $apellido,
    $telefono,
    $fecha_nacimiento,
    $direccion,
    $fecha_registro,
    $nombre_foto
);

if ($stmt->execute()) {
    $ultimo_id = $conexion->insert_id;
    header("Location: ficha_pago.php?id=$ultimo_id");
} else {
    echo "Error al registrar aspirante: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>