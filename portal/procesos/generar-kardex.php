<?php
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['id_rol'] != 1) {
    header("Location: ../../pages/login.php");
    exit();
}

$nombre_usuario = $_SESSION['nombre_persona'];
$ruta_foto = "dist/img/perfiles/" . $_SESSION['foto_perfil'];
include "../conexion.php";

$sql = mysqli_query($conexion, "SELECT a.id_alumno, a.nombre, a.apellido, c.nombre_carrera 
                                FROM alumno a 
                                INNER JOIN carreras c ON a.id_carrera = c.id_carrera 
                                WHERE a.estado = 'Activo'");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Subir Carga Académica | TecNet</title>
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

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="../../dist/img/tecneticon.png" alt="TecNet Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light" style="font-family: monospace;">TECNET</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../<?php echo $ruta_foto; ?>" class="img-circle elevation-2" alt="User Image">
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
                            <a href="../dashboard_director.php" class="nav-link active">
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
                                    <a href="../pages/reportes/administrativo.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Administrativo</p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="../pages/reportes/academico.php" class="nav-link">
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

                                </a>
                        </li>
                        <li class="nav-item">
                            <a href="../pages/tables/data-docentes.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Docentes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../pages/tables/data-alumnos.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Estudiantes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../pages/tables/data-materias.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Asignaturas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../pages/tables/data-grupos.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Grupos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../pages/tables/data-carreras.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Carreras</p>
                            </a>
                        </li>
                    </ul>
                    </li>


                    <li class="nav-item">
                        <a href="../pages/tables/perfil.php" class="nav-link">
                            🧑
                            <p>Perfil</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../logout.php" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                            <p>Cerrar Sesión</p>
                        </a>
                    </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>Generar Kardex</h1>
            </section>

            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Estudiantes Activos</h3>
                    </div>
                    <div class="card-body">
                        <table id="tablaAlumnos" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre Completo</th>
                                    <th>Carrera</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($f = mysqli_fetch_assoc($sql)): ?>
                                    <tr>
                                        <td><?php echo $f['id_alumno']; ?></td>

                                        <td><?php echo $f['nombre'] . ' ' . $f['apellido']; ?></td>
                                        <td><?php echo $f['nombre_carrera']; ?></td>
                                        <td class="text-center">
                                            <a href="ver-kardex.php?id=<?php echo $f['id_alumno']; ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-file-pdf"></i> Generar Kardex
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/moment/locale/es.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script>
        // Para que el nombre del archivo aparezca en el input de AdminLTE
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        $(function() {
            $("#tablaAlumnos").DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
</body>

</html>