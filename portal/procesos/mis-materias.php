<?php
session_start();
include "../conexion.php"; // Ajusta la ruta según tu estructura

// Validación de sesión (Rol 2 = Estudiante)
if (!isset($_SESSION['id_usuario']) || $_SESSION['id_rol'] != 2) {
  header("Location: ../../index.php");
  exit();
}

// Obtenemos el ID del alumno desde la URL (id=2)
$id_alumno = isset($_GET['id']) ? intval($_GET['id']) : 0;

$id_usuario = $_SESSION['id_usuario'];
// CORRECCIÓN: Buscamos el ID real del docente vinculado al usuario de la sesión
$query_doc = mysqli_query($conexion, "SELECT id_alumno FROM usuarios WHERE id_usuario = '$id_usuario'");
$datos_doc = mysqli_fetch_assoc($query_doc);

// Si no encuentra al docente, podrías tener un error, usamos el ID obtenido
$id_alumno_logueado = ($datos_doc) ? $datos_doc['id_alumno'] : 0;
// Consulta para obtener las materias y calificaciones del alumno
$query = "SELECT 
            m.id_materia, 
            m.nombre_materia, 
            m.semestre, cal.parcial1, cal.parcial2, cal.parcial3, cal.parcial4, cal.parcial5, cal.parcial6, cal.parcial7,
            cal.promedio
          FROM calificaciones cal
          INNER JOIN materias m ON cal.id_materia = m.id_materia
          WHERE cal.id_alumno = '$id_alumno'
          ORDER BY m.semestre ASC";

$resultado = mysqli_query($conexion, $query);

$nombre_usuario = $_SESSION['nombre_persona'];
$ruta_foto = "../dist/img/perfiles/" . $_SESSION['foto_perfil'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mis Materias | TecNet</title>
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
</head>

<body class="hold-transition sidebar-mini">
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
      <img src="../../dist/img/tecneticon.png" alt="TecNet Logo" class="brand-image img-circle elevation-3"
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
            <a href="../dashboard_alumno.php" class="nav-link ">
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
            <a href="ver-kardex.php?id=<?php echo $id_alumno_logueado; ?>" class="nav-link">
              📝
              <p>
                Kardex academico
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              📕
              <p>
                Mis materias
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../logout.php" class="nav-link" onclick="return confirm('¿Realmente deseas cerrar sesión?');">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p>Cerrar Sesión</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <div class="wrapper">

    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><i class="fas fa-book-open mr-2"></i>Mi Historial de Materias</h1>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">Listado de Asignaturas y Calificaciones</h3>
                </div>
                <div class="card-body">
                  <table id="tablaMaterias" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Semestre</th>
                        <th>Clave</th>
                        <th>Materia</th>
                        <th>Calificación U1</th>
                        <th>Calificación U2</th>
                        <th>Calificación U3</th>
                        <th>Calificación U4</th>
                        <th>Calificación U5</th>
                        <th>Calificación U6</th>
                        <th>Calificación U7</th>
                        <th>Promedio</th>

                        <th>Estatus</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($row = mysqli_fetch_assoc($resultado)):
                        $calif = $row['promedio'];
                        $badge = ($calif >= 70) ? 'badge-success' : 'badge-danger';
                        $texto = ($calif >= 70) ? 'Aprobada' : 'Reprobada';
                      ?>
                        <tr>
                          <td class="text-center"><?php echo $row['semestre']; ?>°</td>
                          <td><?php echo $row['id_materia']; ?></td>
                          <td><?php echo $row['nombre_materia']; ?></td>
                          <td class="text-center"><?php echo $row['parcial1']; ?></td>
                          <td class="text-center"><?php echo $row['parcial2']; ?></td>
                          <td class="text-center"><?php echo $row['parcial3']; ?></td>
                          <td class="text-center"><?php echo $row['parcial4']; ?></td>
                          <td class="text-center"><?php echo $row['parcial5']; ?></td>
                          <td class="text-center"><?php echo $row['parcial6']; ?></td>
                          <td class="text-center"><?php echo $row['parcial7']; ?></td>
                          <td class="text-center"><strong><?php echo $calif; ?></strong></td>
                          <td class="text-center">
                            <span class="badge <?php echo $badge; ?>"><?php echo $texto; ?></span>
                          </td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <script src="../../plugins/jquery/jquery.min.js"></script>
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../dist/js/adminlte.min.js"></script>

  <script>
    $(function() {
      $("#tablaMaterias").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "order": [
          [0, "asc"]
        ] // Ordenar por semestre por defecto
      });
    });
  </script>
</body>

</html>