<?php
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['id_rol'] != 1) {
  header("Location: ../../pages/login.php");
  exit();
}

$nombre_usuario = $_SESSION['nombre_persona'];
$ruta_foto = "dist/img/perfiles/" . $_SESSION['foto_perfil'];
include "../conexion.php";

  
$res_alumnos = mysqli_query($conexion, "SELECT id_alumno, nombre, apellido FROM alumno WHERE estado = 'Activo' ORDER BY nombre ASC");

  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_alumno = $_POST['id_alumno'];
  $semestre = $_POST['semestre'];
  $obs = $_POST['observaciones'];
  $id_admin = $_SESSION['id_usuario'];

    
  $directorio = "../../dist/docs/cargas/";
  if (!file_exists($directorio)) {
    mkdir($directorio, 0777, true);
  }

  $nombre_archivo = "Carga_" . $id_alumno . "_" . time() . ".pdf";
  $ruta_final = $directorio . $nombre_archivo;

  if (move_uploaded_file($_FILES['pdf_carga']['tmp_name'], $ruta_final)) {
    $sql = "INSERT INTO carga_academica (id_alumno, semestre, archivo_pdf, observaciones, id_usuario_subio) 
                VALUES ('$id_alumno', '$semestre', '$nombre_archivo', '$obs', '$id_admin')";

    if (mysqli_query($conexion, $sql)) {
      $mensaje = "<div class='alert alert-success'>Carga subida correctamente.</div>";
    }
  } else {
    $mensaje = "<div class='alert alert-danger'>Error al subir el archivo.</div>";
  }
}
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
            <a href="../logout.php" class="nav-link" onclick="return confirm('¿Realmente deseas cerrar sesión?');">
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
        <h1>Subir Carga Académica</h1>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Registro de Documento PDF</h3>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <?php if (isset($mensaje)) echo $mensaje; ?>

                <div class="form-group">
                  <label>Seleccionar Estudiante</label>
                  <select name="id_alumno" class="form-control" required>
                    <option value="">-- Seleccione un alumno --</option>
                    <?php while ($row = mysqli_fetch_assoc($res_alumnos)): ?>
                      <option value="<?php echo $row['id_alumno']; ?>">
                        <?php echo $row['nombre'] . " " . $row['apellido']; ?>
                      </option>
                    <?php endwhile; ?>
                  </select>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Semestre Correspondiente</label>
                      <input type="number" name="semestre" class="form-control" min="1" max="12" required>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Archivo PDF (Carga Académica)</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="pdf_carga" class="custom-file-input" accept=".pdf" required>
                          <label class="custom-file-label">Elegir PDF...</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Observaciones Adicionales</label>
                  <textarea name="observaciones" class="form-control" rows="3" placeholder="Ej: Carga extemporánea, revalidación, etc."></textarea>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Guardar Carga Académica</button>
                <a href="../reportes/academico.php" class="btn btn-default">Volver</a>
              </div>
            </form>
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
      
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  </script>
</body>

</html>