<?php
include "../conexion.php";
$id_alumno = $_GET['id'];

// 1. Datos Generales
$query_user = mysqli_query($conexion, "SELECT a.*, c.nombre_carrera FROM alumno a 
    INNER JOIN carreras c ON a.id_carrera = c.id_carrera WHERE a.id_alumno = '$id_alumno'");
$al = mysqli_fetch_assoc($query_user);

// 2. Historial Académico
$query_his = mysqli_query($conexion, "SELECT m.creditos, m.id_materia, m.nombre_materia, m.semestre, cal.promedio 
    FROM calificaciones cal 
    INNER JOIN materias m ON cal.id_materia = m.id_materia 
    WHERE cal.id_alumno = '$id_alumno' ORDER BY m.semestre ASC");

$suma = 0; $conteo = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Kardex_<?php echo $al['nombre']; ?></title>
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="shortcut icon" href="../../dist/img/tecneticon.png" type="image/x-icon">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
    <style>
        .kardex-box { max-width: 900px; margin: 20px auto; background: white; padding: 40px; border: 1px solid #070707; }
        .header-kardex { border-bottom: 3px solid #007bff; margin-bottom: 20px; padding-bottom: 10px; }
        @media print { .btn-print { display: none; } .kardex-box { border: none; width: 100%; max-width: 100%; } }
    </style>
</head>
<body class="bg-gray">

<div class="kardex-box shadow text-dark">
    <div class="text-right btn-print mb-3">
        <button onclick="window.print();" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Exportar a PDF</button>
        <a href="generar-kardex.php" class="btn btn-secondary">Regresar</a>
    </div>

    <div class="header-kardex row align-items-center">
        <div class="col-2 text-center"><img src="../../dist/img/tecneticon.png" width="70"></div>
        <div class="col-10">
            <h2 class="m-0">TECNET: INSTITUTO TECNOLÓGICO</h2>
            <p class="m-0 text-muted">HISTORIAL ACADÉMICO OFICIAL</p>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-7">
            <strong>ESTUDIANTE:</strong> <?php echo strtoupper($al['nombre'] . ' ' . $al['apellido']); ?><br>
            <strong>CARRERA:</strong> <?php echo $al['nombre_carrera']; ?>
        </div>
        <div class="col-5">
            <strong>MATRÍCULA:</strong> <?php echo $al['id_alumno']; ?><br>
            <strong>FECHA:</strong> <?php echo date('d/m/Y H:i'); ?>
        </div>
    </div>

    <table class="table table-sm table-bordered">
        <thead class="bg-light">
            <tr class="text-center">
                <th>SEM</th>
                <th>CREDITOS</th>
                <th>ASIGNATURA</th>
                <th>CALIF.</th>
                <th>OBS</th>
            </tr>
        </thead>
        <tbody>
            <?php while($r = mysqli_fetch_assoc($query_his)): 
                $suma += $r['promedio']; $conteo++;
                $obs = ($r['promedio'] >= 70) ? "ACREDITADA" : "NA";
            ?>
            <tr>
                <td class="text-center"><?php echo $r['semestre']; ?>°</td>
                <td class="text-center"><?php echo $r['creditos']; ?></td>
                <td><?php echo $r['nombre_materia']; ?></td>
                <td class="text-center"><strong><?php echo $r['promedio']; ?></strong></td>
                <td class="text-center small"><?php echo $obs; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div class="row mt-4">
        <div class="col-6 offset-6">
            <table class="table table-bordered bg-light">
                <tr>
                    <th>MATERIAS CURSADAS:</th>
                    <td class="text-center"><?php echo $conteo; ?></td>
                </tr>
                <tr>
                    <th>PROMEDIO GENERAL:</th>
                    <td class="text-center text-primary h4">
                        <strong><?php echo ($conteo > 0) ? round($suma/$conteo, 2) : '0'; ?></strong>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="mt-5 pt-5 text-center">
        <div style="width: 200px; border-top: 1px solid black; margin: 0 auto;"></div>
        <p class="small">FIRMA DE CONTROL ESCOLAR</p>
    </div>
</div>

</body>
</html>