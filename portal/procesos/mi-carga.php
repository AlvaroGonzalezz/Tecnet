<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

include '../conexion.php';

$id_logueado = $_SESSION['id_usuario'];
$query_doc = mysqli_query($conexion, "SELECT id_alumno FROM usuarios WHERE id_usuario = '$id_logueado'");
$datos_doc = mysqli_fetch_assoc($query_doc);

  
$id_alumno_logueado = ($datos_doc) ? $datos_doc['id_alumno'] : 0;
$query = "SELECT id_carga, semestre, archivo_pdf, observaciones, fecha_subida 
          FROM carga_academica 
          WHERE id_alumno = '$id_alumno_logueado' 
          ORDER BY fecha_subida DESC";

$resultado = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Carga Académica - TecNet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card-carga {
            border: none;
            border-radius: 12px;
            shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header-tec {
            background-color: #0a2640;
            color: white;
            padding: 20px;
            border-radius: 12px 12px 0 0;
        }

        .btn-pdf {
            background-color: #e63946;
            border: none;
        }

        .btn-pdf:hover {
            background-color: #c1121f;
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="card card-carga shadow">
            <div class="header-tec d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-journal-text"></i> Mi Carga Académica</h4>
                <a href="../dashboard_alumno.php" class="btn btn-sm btn-outline-light">Regresar</a>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Semestre</th>
                                <th>Fecha de Registro</th>
                                <th>Documento</th>
                                <th class="pe-4">Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($resultado) > 0) {
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                            ?>
                                    <tr>
                                        <td class="ps-4"><strong><?php echo $fila['semestre']; ?>° Semestre</strong></td>
                                        <td><?php echo date("d/m/Y", strtotime($fila['fecha_subida'])); ?></td>
                                        <td>
                                            <a href="../../dist/docs/cargas/<?php echo $fila['archivo_pdf']; ?>" target="_blank" class="btn btn-pdf btn-sm text-white">
                                                <i class="bi bi-file-earmark-pdf"></i> Descargar PDF
                                            </a>
                                        </td>
                                        <td class="pe-4 text-muted">
                                            <small><?php echo $fila['observaciones'] ?: 'Sin observaciones pendientes'; ?></small>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='4' class='text-center py-5 text-muted'>No se encontraron registros de carga académica.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php mysqli_close($conexion); ?>
</body>

</html>