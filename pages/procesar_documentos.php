<?php
require "conexion.php";

$curp_texto = $_POST['curp_texto'];

$directorio = "documentos_aspirantes/" . $curp_texto . "/";
if (!file_exists($directorio)) {
    mkdir($directorio, 0777, true);
}

function subirArchivo($file, $folder) {
    if (isset($file) && $file['error'] === 0) {
        $nombre_archivo = time() . "_" . basename($file['name']);
        $ruta_destino = $folder . $nombre_archivo;
        if (move_uploaded_file($file['tmp_name'], $ruta_destino)) {
            return $ruta_destino;
        }
    }
    return null;
}

$ruta_pago = subirArchivo($_FILES['recibos_pago'], $directorio);
$ruta_seguro = subirArchivo($_FILES['seguro_medico'], $directorio);
$ruta_domicilio = subirArchivo($_FILES['comprobante_domicilio'], $directorio);

$sql = "INSERT INTO documentacion (recibos_pago, curp, seguro_medico, comprobante_domicilio) 
        VALUES (?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssss", 
    $ruta_pago, 
    $curp_texto, 
    $ruta_seguro, 
    $ruta_domicilio
);

if ($stmt->execute()) {
    echo "<script>
            alert('Documentación enviada con éxito. Tu proceso de registro ha finalizado.');
            window.location.href = '../index.html';
          </script>";
} else {
    echo "Error al guardar documentos: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>