<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
  header("Location: ../pages/login.php");
  exit();
}
$nombre_usuario = $_SESSION['nombre_persona'];
$ruta_foto = "dist/img/perfiles/" . $_SESSION['foto_perfil'];
include '../../conexion.php';
// --- 1. LÓGICA: Promedio General por Carrera (Corregido) ---
// Unimos carreras -> alumno -> calificaciones para sacar el promedio real
$sql_prom = mysqli_query($conexion, "SELECT 
                                        c.nombre_carrera, 
                                        ROUND(AVG(cal.promedio), 2) as promedio 
                                     FROM carreras c 
                                     INNER JOIN alumno a ON c.id_carrera = a.id_carrera 
                                     INNER JOIN calificaciones cal ON a.id_alumno = cal.id_alumno 
                                     GROUP BY c.id_carrera");

$lab_prom = [];
$dat_prom = [];

if ($sql_prom) {
  while ($r = mysqli_fetch_assoc($sql_prom)) {
    $lab_prom[] = $r['nombre_carrera'];
    $dat_prom[] = $r['promedio'];
  }
}

$sql_sem = mysqli_query($conexion, "SELECT 
                                        g.semestre, 
                                        COUNT(a.id_alumno) as total 
                                    FROM alumno a
                                    INNER JOIN grupo g ON a.id_grupo = g.id_grupo
                                    WHERE a.estado = 'Activo'
                                    GROUP BY g.semestre
                                    ORDER BY g.semestre ASC");

$lab_sem = [];
$dat_sem = [];

if ($sql_sem && mysqli_num_rows($sql_sem) > 0) {
    while ($r = mysqli_fetch_assoc($sql_sem)) {
        $lab_sem[] = "Semestre " . $r['semestre'];
        $dat_sem[] = $r['total'];
    }
} else {
    // Datos de respaldo por si no hay alumnos asignados a grupos aún
    $lab_sem = ['Sin asignar'];
    $dat_sem = [0];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reporte Administrativo</title>
  <link rel="shortcut icon" href="../../../dist/img/tecneticon.png" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <style>
    .image img {
      width: 40px;
      height: 40px;
      object-fit: cover;
      object-position: center;
      margin-top: 7px;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="../../../dist/img/tecneticon.png" alt="TecNet Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-family: monospace;">TECNET</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../<?php echo $ruta_foto; ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $nombre_usuario; ?></a>
            <small class="text-warning"><?php echo $_SESSION['nombre_rol']; ?></small>
          </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="../../dashboard_director.php" class="nav-link ">
                🏠
                <p>
                  Dashboard
                </p>
              </a>

            <li class="nav-item">
              <a href="#" class="nav-link">
                📊
                <p>
                  Reportes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="administrativo.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Administrativo</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="academico.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Académico</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validation</p>
                </a>
              </li>
            </ul>
          </li> -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                🧾
                <p>
                  Gestión
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../pages/tables/data-admin.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Administrativos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/tables/data-docentes.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Docentes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/tables/data-alumnos.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Estudiantes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/tables/data-materias.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Asignaturas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/tables/data-grupos.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Grupos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/tables/data-carreras.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Carreras</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item">
              <a href="../tables/perfil.php" class="nav-link">
                🧑
                <p>Perfil</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                <p>Cerrar Sesión</p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <h1>Análisis de Rendimiento Académico</h1>
          </div>
        </section>

        <section class="content">
          <div class="container-fluid">
            <div class="row">

              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-chart-bar mr-1"></i> Promedio General por Carrera</h3>
                  </div>
                  <div class="card-body">
                    <canvas id="promedioChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-users mr-1"></i> Alumnos por Semestre</h3>
                </div>
                <div class="card-body">
                  <canvas id="semestreChart" style="min-height: 300px; height: 300px;"></canvas>
                </div>
              </div>
            </div>

            </div>
          </div>
        </section>
      </div>
      <!-- /.content-wrapper -->


      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Add Content Here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../../plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
      $(function() {
      // Gráfica de Promedios
      new Chart($('#promedioChart').get(0).getContext('2d'), {
        type: 'bar',
        data: {
          labels: <?php echo json_encode($lab_prom); ?>,
          datasets: [{
            label: 'Promedio General',
            backgroundColor: '#007bff',
            data: <?php echo json_encode($dat_prom); ?>
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: { yAxes: [{ ticks: { beginAtZero: true, max: 100 } }] }
        }
      });

      // Gráfica de Semestres
      new Chart($('#semestreChart').get(0).getContext('2d'), {
        type: 'doughnut',
        data: {
          labels: <?php echo json_encode($lab_sem); ?>,
          datasets: [{
            data: <?php echo json_encode($dat_sem); ?>,
            backgroundColor: ['#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#00a65a', '#f56954']
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false
        }
      });
    });
    </script>
</body>

</html>