<?php
session_start();

if (!isset($_SESSION['id_usuario'])  ) {
  header("Location: ../../pages/login.php");
  exit();
}
$nombre_usuario = $_SESSION['nombre_persona'];
$ruta_foto = "dist/img/perfiles/" . $_SESSION['foto_perfil'];
include "../../conexion.php";

// 1. Alumnos por Carrera (Ya la tenías, la mantenemos)
$sql_carr = mysqli_query($conexion, "SELECT c.nombre_carrera, COUNT(a.id_alumno) as total FROM carreras c LEFT JOIN alumno a ON c.id_carrera = a.id_carrera GROUP BY c.id_carrera");
$lab_carr = [];
$dat_carr = [];
while ($r = mysqli_fetch_assoc($sql_carr)) {
  $lab_carr[] = $r['nombre_carrera'];
  $dat_carr[] = $r['total'];
}

// 2. Estatus de Alumnos (Egresados, Activos, Bajas)
$sql_est = mysqli_query($conexion, "SELECT estado, COUNT(*) as total FROM alumno GROUP BY estado");
$lab_est = [];
$dat_est = [];
while ($r = mysqli_fetch_assoc($sql_est)) {
  $lab_est[] = $r['estado'];
  $dat_est[] = $r['total'];
}

// 3. Áreas Administrativas (Ej. Control Escolar, Finanzas, etc.)
// Nota: Asegúrate de tener la columna 'area' en tu tabla administrativos
$sql_adm_area = mysqli_query($conexion, "SELECT area, COUNT(*) as total FROM administrativo GROUP BY area");
$lab_area = [];
$dat_area = [];
while ($r = mysqli_fetch_assoc($sql_adm_area)) {
  $lab_area[] = $r['area'];
  $dat_area[] = $r['total'];
}

// 4. Censo Global (Alumnos vs Docentes vs Administrativos)
$q_alu = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT COUNT(*) as t FROM alumno"))['t'];
$q_doc = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT COUNT(*) as t FROM docente"))['t'];
$q_adm = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT COUNT(*) as t FROM administrativo"))['t'];
$dat_global = [$q_alu, $q_doc, $q_adm];
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
      <a href="#" class="brand-link">
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
                  <a href="#" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Administrativo</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="academico.php" class="nav-link">
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
                  <a href="../tables/data-admin.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Administrativos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../tables/data-docentes.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Docentes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../tables/data-alumnos.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Estudiantes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../tables/data-materias.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Asignaturas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../tables/data-grupos.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Grupos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../tables/data-carreras.php" class="nav-link">
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
              <a href="../../logout.php" class="nav-link" onclick="return confirm('¿Realmente deseas cerrar sesión?');">

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
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Gráficas de Gestión Administrativa</h1>
            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-users mr-1"></i> Censo Institucional (Total)</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-graduation-cap mr-1"></i> Alumnos por Carrera</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-chart-pie mr-1"></i> Estatus de Matrícula (Activos/Bajas)</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-briefcase mr-1"></i> Personal Administrativo por Área</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
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
      // --- 1. DONUT: Alumnos por Carrera ---
      new Chart($('#donutChart').get(0).getContext('2d'), {
        type: 'doughnut',
        data: {
          labels: <?php echo json_encode($lab_carr); ?>,
          datasets: [{
            data: <?php echo json_encode($dat_carr); ?>,
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc']
          }]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true
        }
      });

      // --- 2. PIE: Estatus Académico (Activos, Bajas, Egresados) ---
      // Usa el canvas con id="pieChart"
      new Chart($('#pieChart').get(0).getContext('2d'), {
        type: 'pie',
        data: {
          labels: <?php echo json_encode($lab_est); ?>,
          datasets: [{
            data: <?php echo json_encode($dat_est); ?>,
            backgroundColor: ['#28a745', '#dc3545', '#ffc107', '#17a2b8']
          }]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true
        }
      });

      // --- 3. BAR: Áreas Administrativas ---
      // Usa el canvas con id="barChart"
      new Chart($('#barChart').get(0).getContext('2d'), {
        type: 'bar',
        data: {
          labels: <?php echo json_encode($lab_area); ?>,
          datasets: [{
            label: 'Personal por Área',
            data: <?php echo json_encode($dat_area); ?>,
            backgroundColor: '#d9950d'
          }]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });

      // --- 4. PIE/DONUT: Censo Global Institucional ---
      // Usa el canvas con id="areaChart" (puedes cambiarle el título a "Censo")
      new Chart($('#areaChart').get(0).getContext('2d'), {
        type: 'pie',
        data: {
          labels: ['Alumnos', 'Docentes', 'Administrativos'],
          datasets: [{
            data: <?php echo json_encode($dat_global); ?>,
            backgroundColor: ['#007bff', '#20c997', '#fd7e14']
          }]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true
        }
      });
    });
  </script>
</body>

</html>