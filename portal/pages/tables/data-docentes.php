<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
  header("Location: ../pages/login.php");
  exit();
}
$nombre_usuario = $_SESSION['nombre_persona'];
$ruta_foto = "dist/img/perfiles/" . $_SESSION['foto_perfil'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tecnet - Dashboard</title>
  <link rel="shortcut icon" href="../../../dist/img/tecneticon.png" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- Main Sidebar Container -->
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
              <a href="../../dashboard_director.php" class="nav-link">
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
                  <a href="../reportes/administrativo.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Administrativo</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../reportes/academico.php" class="nav-link">
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
              <a href="#" class="nav-link active">
                🧾
                <p>
                  Gestión
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="data-admin.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Administrativos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link active">
                    <i class="far fa-user nav-icon"></i>
                    <p>Docentes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="data-alumnos.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Estudiantes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="data-materias.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Asignaturas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="data-grupos.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Grupos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="data-carreras.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Carreras</p>
                  </a>
                </li>

              </ul>
            </li>


            <li class="nav-item">
              <a href="perfil.php" class="nav-link">
                🧑
                <p>Perfil</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../logout.php" class="nav-link" onclick="return confirm('¿Realmente deseas cerrar sesión?');">
                🔒
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
              <h1>Gestión de Docentes</h1>

            </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">


              <div class="card">
                <div class="card-header">
                  <button class="btn btn-success" data-toggle="modal" data-target="#modalAltaDocente">
                    <i class="fas fa-user-plus"></i> Nuevo Docente
                  </button>
                </div>
                <div class="card-body">

                  <table id="tablaDocentes" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Rol</th>
                        <th>Fotografía</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include "../../conexion.php";


                      $sql = "SELECT 
              d.id_docente, 
              d.nombre, 
              d.apellido, 
              d.correo, 
              d.telefono,
              u.usuario, 
              d.foto,
              r.nombre_rol 
            FROM docente d
            LEFT JOIN usuarios u ON d.id_docente = u.id_docente
            LEFT JOIN roles r ON u.id_rol = r.id_rol
            ORDER BY d.id_docente DESC";

                      $resultado = mysqli_query($conexion, $sql);

                      if (mysqli_num_rows($resultado) > 0) {
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                      ?>
                          <tr>
                            <td><?php echo $fila['nombre'] . " " . $fila['apellido']; ?></td>

                            <td><?php echo $fila['correo']; ?></td>
                            <td><?php echo ($fila['telefono']) ? $fila['telefono'] : 'N/A'; ?></td>

                            <td>
                              <span class="badge badge-success">
                                <?php echo ($fila['nombre_rol']) ? $fila['nombre_rol'] : 'Docente'; ?>
                              </span>
                            </td>
                            <td>
                              <img src="../../dist/img/perfiles/<?php echo $fila['foto']; ?>"
                                class="img-circle"
                                style="width: 35px; height: 35px; object-fit: cover; margin-right: 10px;">
                            </td>
                            <td class="text-center">
                              <button class="btn btn-warning btn-sm"
                                onclick="prepararEdicionDocente(<?php echo $fila['id_docente']; ?>)"
                                title="Editar">
                                <i class="fas fa-edit"></i>
                              </button>

                              <button class="btn btn-danger btn-sm"
                                onclick="eliminarDocente(<?php echo $fila['id_docente']; ?>)"
                                title="Eliminar">
                                <i class="fas fa-trash"></i>
                              </button>
                            </td>
                          </tr>
                      <?php
                        }
                      } else {
                        echo "<tr><td colspan='6' class='text-center'>No hay docentes registrados</td></tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                  </table>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <div class="modal fade" id="modalAgregarDocente" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Agregar Docente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <form action="agregar_docente.php" method="POST">

          <div class="modal-body">

            <div class="mb-3">
              <label class="form-label">Nombre</label>
              <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Apellido</label>
              <input type="text" name="apellido" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Correo</label>
              <input type="email" name="correo" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Teléfono</label>
              <input type="text" name="telefono" class="form-control">
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>

        </form>

      </div>
    </div>
  </div>
  <div class="modal fade" id="modalEditarDocente" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title">Editar Docente</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form id="formEditarDocente">
          <div class="modal-body">
            <input type="hidden" name="id_docente" id="edit_id_docente">

            <div class="form-group">
              <label>Nombre</label>
              <input type="text" name="nombre" id="edit_nombre" class="form-control">
            </div>
            <div class="form-group">
              <label>Apellido</label>
              <input type="text" name="apellido" id="edit_apellido" class="form-control">
            </div>
            <div class="form-group">
              <label>Correo</label>
              <input type="email" name="correo" id="edit_correo" class="form-control">
            </div>
            <div class="form-group">
              <label>Teléfono</label>
              <input type="text" name="telefono" id="edit_telefono" class="form-control">
            </div>
            <div class="form-group">
              <label>Fotografía</label>
              <input type="file" name="foto" class="form-control" accept="image/*">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-warning">Actualizar Cambios</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="editarLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title" id="editarLabel"><i class="fas fa-edit"></i> Editar Información</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formEditarAdmin">
          <div class="modal-body">
            <input type="hidden" name="id_administrativo" id="edit_id">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nombre(s)</label>
                  <input type="text" name="nombre" id="edit_nombre" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Apellidos</label>
                  <input type="text" name="apellido" id="edit_apellido" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Área</label>
                  <input type="text" name="area" id="edit_area" class="form-control" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Correo (Este vincula las cuentas)</label>
                  <input type="email" name="correo" id="edit_correo" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Usuario</label>
                  <input type="text" name="usuario" id="edit_usuario" class="form-control" readonly>
                  <small class="text-muted">El nombre de usuario no se puede cambiar por seguridad.</small>
                </div>
                <div class="form-group text-center mt-4">
                  <button type="button" class="btn btn-outline-danger btn-block btn-sm">
                    Restablecer Contraseña
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-warning">Actualizar Cambios</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalAltaDocente" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title"><i class="fas fa-chalkboard-teacher"></i> Registrar Nuevo Docente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formNuevoDocente">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nombre(s)</label>
                  <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Apellidos</label>
                  <input type="text" name="apellido" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Correo Electrónico</label>
                  <input type="email" name="correo" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Teléfono</label>
                  <input type="text" name="telefono" class="form-control">
                </div>
                <div class="form-group">
                  <label>Fotografía</label>
                  <input type="file" name="foto" class="form-control" accept="image/*">
                </div>
              </div>

              <div class="col-md-6" style="border-left: 1px solid #ddd;">
                <div class="form-group">
                  <label>Nombre de Usuario</label>
                  <input type="text" name="usuario" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Contraseña</label>
                  <input type="password" name="contraseña" class="form-control" required>
                </div>
                <input type="hidden" name="id_rol" value="3">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-success">Guardar Docente</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../../plugins/jszip/jszip.min.js"></script>
  <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    function eliminarDocente(id) {
      if (confirm('¿Estás seguro de eliminar este docente? También se borrará su cuenta de usuario.')) {
        $.ajax({
          url: 'operaciones_docente.php',
          type: 'POST',

          data: {
            id_docente: id,
            accion: 'eliminar'
          },
          success: function(res) {
            console.log("Respuesta servidor:", res);
            if (res.trim() === "success") {
              alert("Docente eliminado correctamente.");
              location.reload();
            } else {
              alert("Error al eliminar: " + res);
            }
          },
          error: function() {
            alert("Error de conexión con el servidor.");
          }
        });
      }
    }

    function prepararEdicionDocente(id) {
      console.log("Intentando editar docente con ID: " + id);

      $.ajax({
        url: 'get_docente.php',
        type: 'POST',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(data) {

          $('#edit_id_docente').val(data.id_docente);
          $('#edit_nombre').val(data.nombre);
          $('#edit_apellido').val(data.apellido);
          $('#edit_correo').val(data.correo);
          $('#edit_telefono').val(data.telefono);


          $('#modalEditarDocente').modal('show');
        },
        error: function(xhr) {
          console.error(xhr.responseText);
          alert("Error: No se pudo conectar con get_docente.php");
        }
      });
    }


    $('#formEditarDocente').on('submit', function(e) {
      e.preventDefault();

      var datos = new FormData(this);
      datos.append('accion', 'editar');

      $.ajax({
        url: 'operaciones_docente.php',
        type: 'POST',
        data: datos,
        contentType: false,
        processData: false,
        success: function(res) {
          if (res.trim() === "success") {
            alert("Docente actualizado con éxito");
            location.reload();
          } else {
            alert("Error: " + res);
          }
        }
      });
    });

    function prepararEdicionDocente(id) {
      $.ajax({
        url: 'get_docente.php',
        type: 'POST',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(data) {
          $('#edit_id_docente').val(data.id_docente);
          $('#edit_nombre').val(data.nombre);
          $('#edit_apellido').val(data.apellido);
          $('#edit_correo').val(data.correo);
          $('#edit_telefono').val(data.telefono);

          $('#modalEditarDocente').modal('show');
        }
      });
    }

    function editarDocente(id, nombre, apellido, correo, telefono) {

      document.getElementById("id_docente").value = id;
      document.getElementById("editar_nombre").value = nombre;
      document.getElementById("editar_apellido").value = apellido;
      document.getElementById("editar_correo").value = correo;
      document.getElementById("editar_telefono").value = telefono;

      var modal = new bootstrap.Modal(document.getElementById('modalEditarDocente'));
      modal.show();

    }
    $('#formNuevoDocente').on('submit', function(e) {
      e.preventDefault();

      var datos = new FormData(this);
      datos.append('accion', 'nuevo');

      $.ajax({
        url: 'operaciones_docente.php',
        type: 'POST',
        data: datos,
        contentType: false,
        processData: false,
        success: function(res) {
          if (res.trim() === "success") {
            location.reload();
          } else {
            alert(res);
          }
        }
      });
    });


    function prepararEdicion(id) {
      $.ajax({
        url: 'get_admin.php',
        type: 'POST',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(data) {

          $('#edit_id').val(data.id_administrativo);
          $('#edit_nombre').val(data.nombre);
          $('#edit_apellido').val(data.apellido);
          $('#edit_correo').val(data.correo);
          $('#edit_area').val(data.area);
          $('#edit_usuario').val(data.usuario);


          $('#edit_telefono').val(data.telefono);


          $('#modalEditar').modal('show');
        },
        error: function() {
          alert("No se pudieron cargar los datos del docente.");
        }
      });
    }


    function eliminarAdministrativo(id) {
      if (confirm('¿Estás seguro de eliminar a este docente? Se borrará también su cuenta de acceso.')) {
        $.ajax({
          url: 'operaciones_docente.php',
          type: 'POST',
          data: {
            id_administrativo: id,
            accion: 'eliminar'
          },
          success: function(res) {
            if (res.trim() === "success") {
              alert("Eliminado correctamente");
              location.reload();
            } else {
              alert("Error del servidor: " + res);
            }
          },
          error: function() {
            alert("Error de conexión");
          }
        });
      }
    }
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>