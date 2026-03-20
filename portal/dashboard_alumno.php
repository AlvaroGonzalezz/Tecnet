<<<<<<< HEAD
=======
<?php
session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['id_rol'] != 2) {
  header("Location: ../pages/login.php");
  exit();
}
$nombre_usuario = $_SESSION['nombre_persona'];
$ruta_foto = "dist/img/perfiles/" . $_SESSION['foto_perfil'];
?>
>>>>>>> 7a65ea5438957b002e274621122c6d5e109eca4e
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
  <title>Alumno - TecNet</title>
=======
  <title>Dashboard - TecNet</title>
>>>>>>> 7a65ea5438957b002e274621122c6d5e109eca4e
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
<<<<<<< HEAD
=======
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
>>>>>>> 7a65ea5438957b002e274621122c6d5e109eca4e
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/tecneticon.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="../dist/img/tecneticon.png" alt="TecNet Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-family: monospace;">TECNET</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
<<<<<<< HEAD
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Administrador</a>
=======
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo $ruta_foto; ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $nombre_usuario; ?></a>
            <small class="text-warning"><?php echo $_SESSION['nombre_rol']; ?></small>
>>>>>>> 7a65ea5438957b002e274621122c6d5e109eca4e
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

<<<<<<< HEAD
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
                  <a href="pages/charts/flot.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Calificaciones</p>
                  </a>
                </li>
              </ul>
            </li>
=======
                
>>>>>>> 7a65ea5438957b002e274621122c6d5e109eca4e
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
<<<<<<< HEAD
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
                  <a href="pages/tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Asignaturas</p>
                  </a>
                </li>
               
                <li class="nav-item">
                 <a href="pages/charts/chartjs.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Carreras</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Horarios</p>
                  </a>
                </li>
              </ul>
            </li>
=======
            
>>>>>>> 7a65ea5438957b002e274621122c6d5e109eca4e

            <li class="nav-item">
              <a href="pages/calendar.html" class="nav-link">
                📅
                <p>
                  Calendario
                </p>
              </a>
            </li>
            <li class="nav-item">
<<<<<<< HEAD
              <a href="pages/examples/profile.html" class="nav-link">
                🧑
                <p>Perfil</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/profile.html" class="nav-link">
                🔒
=======
              <a href="pages/calendar.html" class="nav-link">
                📝
                <p>
                  Kardex academico
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/calendar.html" class="nav-link">
                📕
                <p>
                  Mis materias 
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/calendar.html" class="nav-link">
                📂
                <p>
                  Documentos
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
>>>>>>> 7a65ea5438957b002e274621122c6d5e109eca4e
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
<<<<<<< HEAD
              <h1 class="m-0">¡Hola, pumbitakush!👋</h1>
=======
              <h1 class="m-0">¡Hola <?php echo $nombre_usuario; ?>!👋</h1>
>>>>>>> 7a65ea5438957b002e274621122c6d5e109eca4e
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
<<<<<<< HEAD
                  <h3>1200</h3>

                  <p>Alumnos</p>
=======
                  <h4>Datos personales</h4>

                  <dt>Nombre:</dt>
                  <dt>Edad:</dt>
                  <dt>Genero:</dt>
                  <dt>Carrera:</dt>
>>>>>>> 7a65ea5438957b002e274621122c6d5e109eca4e
                </div>
                <div class="icon">
                  <i class="ion bi bi-mortarboard-fill"></i>
                </div>
<<<<<<< HEAD
                <a href="#" class="small-box-footer">Más Información <i
                    class="fas fa-arrow-circle-right"></i></a>
=======
                
>>>>>>> 7a65ea5438957b002e274621122c6d5e109eca4e
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
<<<<<<< HEAD
                  <h3>Próximos Eventos</h3>

                  <p>Eventec</p>
                </div>
                <div class="icon">
                  <i class="bi bi-calendar-event"></i>
                </div>
                <a href="https://gusoft.com.mx/Eventec/paginas/inicio/index.php" class="small-box-footer">Más Información <i
=======
                  

                  <h4>Numeros de asignaturas</h4>
                </div>
                <div class="icon">
                  <i class="ion bi bi-person-vcard-fill"></i>
                </div>
                <a href="#" class="small-box-footer">Más Información <i
>>>>>>> 7a65ea5438957b002e274621122c6d5e109eca4e
                    class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
<<<<<<< HEAD
                  <h3>Calificaciones</h3>

                  <p>Kardex</p>
=======
                  <h4>Boleta de calificaciones</h4>

                  
>>>>>>> 7a65ea5438957b002e274621122c6d5e109eca4e
                </div>
                <div class="icon">
                  <i class="ion bi bi-person-workspace"></i>
                </div>
                <a href="#" class="small-box-footer">Más Información <i
                    class="fas fa-arrow-circle-right"></i></a>
<<<<<<< HEAD
              </div>    
=======
              </div>
>>>>>>> 7a65ea5438957b002e274621122c6d5e109eca4e
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
<<<<<<< HEAD
             
                <!-- ./col -->
            
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
          
=======
              <div class="small-box bg-danger">
                <div class="inner">
                  <h4>Lista de calificaciones:</h4>
                  <dt>Calificación 1:</dt>
                  <dt>Calificación 2:</dt>
                  <dt>Calificación 3:</dt>
                  <dt>Calificación 4:</dt>

                </div>
                <div class="icon">
                  <i class="bi bi-c-square-fill"></i>
                </div>
                <a href="#" class="small-box-footer">Más Información <i
                    class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <!-- /.row -->
          <!-- Main row -->
        
              <!-- /.card -->

              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Alumnos por carrera</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="donutChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
            </section>
>>>>>>> 7a65ea5438957b002e274621122c6d5e109eca4e
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

              <!-- Map card -->
              <div style="display: none;">
                <div class="card bg-gradient-primary">
                  <div class="card-header border-0">
                    <h3 class="card-title">
                      <i class="fas fa-map-marker-alt mr-1"></i>
                      Visitors
                    </h3>
                    <!-- card tools -->
                    <div class="card-tools">
                      <button type="button" class="btn btn-primary btn-sm daterange"
                        title="Date range">
                        <i class="far fa-calendar-alt"></i>
                      </button>
                      <button type="button" class="btn btn-primary btn-sm"
                        data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <div class="card-body">
                    <div id="world-map" style="height: 250px; width: 100%;"></div>
                  </div>
                  <!-- /.card-body-->
                  <div class="card-footer bg-transparent">
                    <div class="row">
                      <div class="col-4 text-center">
                        <div id="sparkline-1"></div>
                        <div class="text-white">Visitors</div>
                      </div>
                      <!-- ./col -->
                      <div class="col-4 text-center">
                        <div id="sparkline-2"></div>
                        <div class="text-white">Online</div>
                      </div>
                      <!-- ./col -->
                      <div class="col-4 text-center">
                        <div id="sparkline-3"></div>
                        <div class="text-white">Sales</div>
                      </div>
                      <!-- ./col -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
              </div>
              <!-- /.card -->

              <!-- solid sales graph -->
              <div style="display: none;">
                <div class="card bg-gradient-info">
                  <div class="card-header border-0">
                    <h3 class="card-title">
                      <i class="fas fa-th mr-1"></i>
                      Sales Graph
                    </h3>

                    <div class="card-tools">
                      <button type="button" class="btn bg-info btn-sm"
                        data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas class="chart" id="line-chart"
                      style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer bg-transparent">
                    <div class="row">
                      <div class="col-4 text-center">
                        <input type="text" class="knob" data-readonly="true" value="20"
                          data-width="60" data-height="60" data-fgColor="#39CCCC">

                        <div class="text-white">Mail-Orders</div>
                      </div>
                      <!-- ./col -->
                      <div class="col-4 text-center">
                        <input type="text" class="knob" data-readonly="true" value="50"
                          data-width="60" data-height="60" data-fgColor="#39CCCC">

                        <div class="text-white">Online</div>
                      </div>
                      <!-- ./col -->
                      <div class="col-4 text-center">
                        <input type="text" class="knob" data-readonly="true" value="30"
                          data-width="60" data-height="60" data-fgColor="#39CCCC">

                        <div class="text-white">In-Store</div>
                      </div>
                      <!-- ./col -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.card-footer -->
                </div>
              </div>
              <!-- /.card -->

<<<<<<< HEAD
           
=======
              
>>>>>>> 7a65ea5438957b002e274621122c6d5e109eca4e
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </section>
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
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
              data: [700, 500, 400, 600,],
              backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
          }
          var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
          }
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
          })
        })
  </script>
</body>

</html>