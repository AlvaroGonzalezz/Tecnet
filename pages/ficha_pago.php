<?php
require "conexion.php";

if (!isset($_GET['id'])) {
    header("Location: registro.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT a.*, c.nombre_carrera 
        FROM aspirantes a 
        INNER JOIN carreras c ON a.id_carrera_opcion1 = c.id_carrera 
        WHERE a.id_aspirante = ?";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$datos = $resultado->fetch_assoc();

$referencia = "TEC" . date("Y") . str_pad($id, 5, "0", STR_PAD_LEFT);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha de Pago - Tecnet</title>
    <style>
        * { margin: 0; padding: 0; box-box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        
        body {
            background-color: #2b3bb3; /* Azul de fondo */
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .container {
            display: flex;
            width: 90%;
            max-width: 1200px;
            align-items: center;
            justify-content: space-around;
        }

        /* Lado Izquierdo: Branding */
        .branding {
            text-align: center;
            flex: 1;
        }

        .branding img {
            width: 250px; /* Ajusta según tu logo naranja */
            margin-bottom: 20px;
        }

        .branding h1 {
            font-size: 80px;
            letter-spacing: 5px;
            margin-bottom: 0;
        }

        .branding p {
            font-size: 40px;
            font-weight: 300;
        }

        /* Lado Derecho: Ficha y Botón */
        .content-right {
            flex: 1;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 30px;
        }

        .ficha {
            background: white;
            color: #333;
            width: 400px;
            padding: 25px;
            border-radius: 4px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .ficha-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            border-bottom: 2px solid #003366;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .ficha-header .logo { font-weight: bold; font-size: 22px; color: #003366; }
        .ficha-header .desc { text-align: right; font-size: 11px; color: #666; }

        .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; font-size: 12px; }
        .label { font-weight: bold; text-transform: uppercase; color: #222; margin-bottom: 2px; }
        .dato { margin-bottom: 10px; color: #444; }

        .pago-area {
            border: 2px dashed #003366;
            margin-top: 15px;
            padding: 15px;
            text-align: center;
        }

        .monto { font-size: 22px; color: #e63946; font-weight: bold; margin-bottom: 10px; }
        
        .barcode-img {
            width: 100%;
            height: 60px;
            background: repeating-linear-gradient(90deg, #000, #000 1px, #fff 1px, #fff 3px);
            margin: 10px 0;
        }

        .pie-ficha { font-size: 9px; color: #888; margin-top: 10px; line-height: 1.2; }

        /* Sección del Botón */
        .action-zone {
            text-align: center;
            max-width: 200px;
        }

        .action-zone p {
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .btn-documentacion {
            display: block;
            background-color: #002855; /* Azul oscuro del botón */
            color: white;
            text-decoration: none;
            padding: 15px 20px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            border: 1px solid rgba(255,255,255,0.2);
            transition: 0.3s;
        }

        .btn-documentacion:hover {
            background-color: #003d82;
            transform: scale(1.05);
        }

        @media print {
            .branding, .action-zone { display: none; }
            body { background: white; }
            .ficha { box-shadow: none; border: 1px solid #000; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="branding">
        <img src="../dist/img/tecneticon.png" alt="Tecnet Logo">
        <h1>TECNET</h1>
        <p>Gestión Escolar</p>
    </div>

    <div class="content-right">
        <div class="ficha">
            <div style="font-size: 10px; text-align: right; cursor: pointer;" onclick="window.print()">Imprimir ficha</div>
            <div class="ficha-header">
                <div class="logo">TECNET</div>
                <div class="desc"><strong>CONVOCATORIA 2026</strong><br>Ficha de Depósito Bancario</div>
            </div>

            <div class="info-grid">
                <div>
                    <div class="label">Nombre del Aspirante</div>
                    <div class="dato"><?php echo $datos['nombre'] . " " . $datos['apellido']; ?></div>
                    <div class="label">CURP</div>
                    <div class="dato"><?php echo $datos['curp']; ?></div>
                </div>
                <div>
                    <div class="label">Carrera Solicitada</div>
                    <div class="dato"><?php echo $datos['nombre_carrera']; ?></div>
                    <div class="label">Referencia de Pago</div>
                    <div class="dato"><strong><?php echo $referencia; ?></strong></div>
                </div>
            </div>

            <div class="pago-area">
                <div style="font-size: 11px; font-weight: bold;">CONCEPTO: EXAMEN DE ADMISIÓN + INSCRIPCIÓN </div>
                <div class="monto">$4,500.00 MXN</div>
                <div class="barcode-img"></div>
                <div style="font-size: 10px;"><?php echo $referencia; ?>3001122334455</div>
            </div>

            <div class="pie-ficha">
                * Esta ficha es personal e intransferible. El pago debe realizarse únicamente en ventanillas de bancos autorizados o mediante transferencia electrónica usando la referencia mencionada.
            </div>
        </div>

        <div class="action-zone">
            <p>¿Ya realizaste tu pago?</p>
            <a href="documento.php?id=<?php echo $id; ?>" class="btn-documentacion">
                Subir mi documentación
            </a>
        </div>
    </div>
</div>

</body>
</html>