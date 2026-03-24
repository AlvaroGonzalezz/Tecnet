<?php
session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['id_rol'] != 2) {
  header("Location: ../pages/login.php");
  exit();
}
$nombre_usuario = $_SESSION['nombre_persona'];
$ruta_foto = "dist/img/perfiles/" . $_SESSION['foto_perfil'];
include "conexion.php";   

$id_usuario = $_SESSION['id_usuario'];
  
$query_doc = mysqli_query($conexion, "SELECT id_alumno FROM usuarios WHERE id_usuario = '$id_usuario'");
$datos_doc = mysqli_fetch_assoc($query_doc);

  
$id_alumno_logueado = ($datos_doc) ? $datos_doc['id_alumno'] : 0;
$nombre_usuario = $_SESSION['nombre_persona'];
$ruta_foto = "dist/img/perfiles/" . $_SESSION['foto_perfil'];

  
  
$query = "SELECT a.*, c.nombre_carrera,  g.semestre 
          FROM alumno a
          INNER JOIN carreras c ON a.id_carrera = c.id_carrera
          INNER JOIN grupo g ON a.id_grupo = g.id_grupo
          WHERE a.id_alumno = '$id_alumno_logueado'";

$resultado = mysqli_query($conexion, $query);
$datos = mysqli_fetch_assoc($resultado);

  
if (!$datos) {
  echo "Error: No se encontraron datos de perfil para este alumno.";
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - TecNet</title>
  <link rel="shortcut icon" href="../dist/img/tecneticon.png" type="image/x-icon">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <style>
    .image img {
      width: 40px;
      /* Ajusta al tamaño que desees */
      height: 40px;
      /* Debe ser igual al ancho */
      object-fit: cover;
      /* ESTA ES LA CLAVE: Recorta la imagen para llenar el cuadro sin deformarla */
      object-position: center;
      /* Centra el recorte en el rostro */
      margin-top: 7px;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/tecneticon.png" alt="AdminLTELogo" height="60" width="60">
  </div>



    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="../dist/img/tecneticon.png" alt="TecNet Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-family: monospace;">TECNET</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo $ruta_foto; ?>" class="img-circle elevation-2" alt="User Image">
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
              <a href="#" class="nav-link active">
                🏠
                <p>
                  Dashboard
                </p>
              </a>


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
              <a href="procesos/ver-kardex.php?id=<?php echo $id_alumno_logueado; ?>" class="nav-link">
                📝
                <p>
                  Kardex academico
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="procesos/mis-materias.php?id=<?php echo $id_alumno_logueado; ?>" class="nav-link">
                📕
                <p>
                  Mis materias
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="logout.php" class="nav-link" onclick="return confirm('¿Realmente deseas cerrar sesión?');">

                <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                <p>Cerrar Sesión</p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6"><br>
              <h1 class="m-0">¡Hola <?php echo $nombre_usuario; ?>!👋</h1>
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card card-outline card-primary">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-user-graduate mr-2"></i> Expediente del Estudiante</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <p><strong><i class="fas fa-id-card mr-1"></i> Nombre:</strong> <span class="text-muted"><?php echo $datos['nombre'] . " " . $datos['apellido']; ?></span></p>
                      <p><strong><i class="fas fa-id-card mr-1"></i> CURP:</strong> <span class="text-muted"><?php echo $datos['curp']; ?></span></p>
                      <p><strong><i class="fas fa-calendar-alt mr-1"></i> Fecha de Nacimiento:</strong> <span class="text-muted"><?php echo $datos['fecha_nacimiento']; ?></span></p>
                      <p><strong><i class="fas fa-map-marker-alt mr-1"></i> Dirección:</strong> <span class="text-muted"><?php echo $datos['direccion']; ?></span></p>
                    </div>
                    <div class="col-sm-6">
                      <p><strong><i class="fas fa-phone mr-1"></i> Teléfono:</strong> <span class="text-muted"><?php echo $datos['telefono']; ?></span></p>
                      <p><strong><i class="fas fa-envelope mr-1"></i> Correo:</strong> <span class="text-muted"><?php echo $datos['correo']; ?></span></p>
                      <p><strong><i class="fas fa-university mr-1"></i> Carrera:</strong> <span class="text-info"><?php echo $datos['nombre_carrera']; ?></span></p>
                      <p><strong><i class="fas fa-users mr-1"></i> Semestre:</strong> <span class="text-muted"><?php echo $datos['semestre'] . "° Semestre"; ?></span></p>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <span class="badge <?php echo ($datos['estado'] == 'Activo') ? 'badge-success' : 'badge-danger'; ?>">
                    Estatus: <?php echo $datos['estado']; ?>
                  </span>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $datos['semestre']; ?>°</h3>
                  <p>Semestre Actual</p>
                </div>
                <div class="icon">
                  <i class="fas fa-graduation-cap"></i>
                </div>
                <a href="procesos/ver-kardex.php?id=<?php echo $id_alumno_logueado; ?>" class="small-box-footer">Ver mi Kardex <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>Carga Académica</h3>
                  <p>Consultar mi Carga Académica</p>
                </div>
                <div class="icon">
                  <i class="fas fa-graduation-cap"></i>
                </div>
                <a href="procesos/mi-carga.php?id=<?php echo $id_alumno_logueado; ?>" class="small-box-footer">Ver mi Carga Académica <i class="fas fa-arrow-circle-right"></i></a>
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
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/moment/locale/es.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <script>
    $(function() {

      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
      var donutData = {
        labels: [
          'Sistemas Computacionales',
          'Industrial',
          'Logística',
          'Gestión Empresarial',
        ],
        datasets: [{
          data: [700, 500, 400, 600, ],
          backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }]
      }
      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      //Create pie or douhnut chart
        
      new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      })
    })
  </script>
</body>

</html>