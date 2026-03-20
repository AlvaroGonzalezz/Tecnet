<?php
session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['id_rol'] != 4) {
  header("Location: ../pages/login.php");
  exit();
}

// 2. Preparar variables para el HTML
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

    <!-- Main Sidebar Container -->
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
                  <a href="pages/charts/chartjs.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Administrativo</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/flot.html" class="nav-link">
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
                  <a href="pages/tables/data-admin.php" class="nav-link active">
                    <i class="far fa-user nav-icon"></i>
                    <p>Administrativos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="data-docentes.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Docentes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Estudiantes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Asignaturas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Grupos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/data.html" class="nav-link">
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

            <li class="nav-item">
              <a href="pages/calendar.html" class="nav-link">
                📅
                <p>
                  Calendario
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/profile.html" class="nav-link">
                🧑
                <p>Perfil</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/profile.html" class="nav-link">
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
              <h1>Gestión Administrativa</h1>

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
                  <button class="btn btn-success float-left" data-toggle="modal" data-target="#modalAlta">
                    <i class="bi bi-person-plus"></i> + Nuevo Administrativo
                  </button>
                </div>
                <div class="card-body">
                  <table id="tablaAdmin" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Área</th>
                        <th>Rol</th>
                        <th>Fotografía</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include "../../conexion.php";

                      $sql = "SELECT 
              a.id_administrativo, 
              a.nombre, 
              a.apellido, 
              a.correo, 
              a.foto,
              a.area, 
              a.telefono,
              u.usuario, 
              r.nombre_rol 
            FROM administrativo a
            LEFT JOIN usuarios u ON a.id_administrativo = u.id_administrativo
            LEFT JOIN roles r ON u.id_rol = r.id_rol
            ORDER BY a.id_administrativo DESC";

                      $resultado = mysqli_query($conexion, $sql);

                      if (mysqli_num_rows($resultado) > 0) {
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                      ?>
                          <tr>
                            <td><?php echo $fila['nombre'] . " " . $fila['apellido']; ?></td>
                            <td><?php echo $fila['correo']; ?></td>
                            <td><?php echo ($fila['telefono']) ? $fila['telefono'] : 'N/A'; ?></td>
                            <td><?php echo $fila['area']; ?></td>
                            <td>
                              <span class="badge badge-primary">
                                <?php echo ($fila['nombre_rol']) ? $fila['nombre_rol'] : 'Sin Rol'; ?>
                              </span>
                            </td>
                            <td>
                              <img src="../../dist/img/perfiles/<?php echo $fila['foto']; ?>"
                                class="img-circle elevation-2"
                                style="width: 50px; height: 50px; object-fit: cover;">
                            </td>
                            <td class="text-center">
                              <button class="btn btn-warning btn-sm" onclick="prepararEdicion(<?php echo $fila['id_administrativo']; ?>)">
                                <i class="fas fa-edit"></i>
                              </button>
                              <button class="btn btn-danger btn-sm" onclick="eliminarAdministrativo(<?php echo $fila['id_administrativo']; ?>)">
                                <i class="fas fa-trash"></i>
                              </button>
                            </td>
                          </tr>
                      <?php
                        }
                      } else {
                        echo "<tr><td colspan='7' class='text-center'>No se encontraron registros</td></tr>";
                      }
                      ?>
                    </tbody>
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
  <div class="modal fade" id="modalAlta" tabindex="-1" role="dialog" aria-labelledby="registroLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="registroLabel"><i class="fas fa-user-plus"></i> Registrar Nuevo Administrativo</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formNuevoAdmin">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <label class="text-primary">Datos Personales</label>
                <div class="form-group">
                  <input type="text" name="nombre" class="form-control" placeholder="Nombre(s)" required>
                </div>
                <div class="form-group">
                  <input type="text" name="apellido" class="form-control" placeholder="Apellidos" required>
                </div>
                <div class="form-group">
                  <input type="email" name="correo" class="form-control" placeholder="Correo electrónico" required>
                </div>
                <div class="form-group">
                  <input type="text" name="telefono" class="form-control" placeholder="Teléfono" required>
                </div>
                <div class="form-group">
                  <input type="text" name="area" class="form-control" placeholder="Área / Departamento" required>
                </div>
                <div class="form-group">
                  <label>Foto de Perfil</label>
                  <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                </div>
              </div>
              <div class="col-md-6" style="border-left: 1px solid #dee2e6;">
                <label class="text-primary">Acceso al Sistema</label>
                <div class="form-group">
                  <input type="text" name="usuario" class="form-control" placeholder="Nombre de usuario" required>
                </div>
                <div class="form-group">
                  <input type="password" name="contraseña" class="form-control" placeholder="Contraseña segura" required>
                </div>
                <div class="form-group">
                  <label><small>Rol de usuario:</small></label>
                  <select name="id_rol" class="form-control" required>
                    <option value="1">Administrativo</option>

                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar Administrativo</button>
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
                  <label>Teléfono</label>
                  <input type="text" name="telefono" id="edit_telefono" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Área</label>
                  <input type="text" name="area" id="edit_area" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Foto de Perfil</label>
                  <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
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
    $('#formEditarAdmin').on('submit', function(e) {
      e.preventDefault();

      // FormData es OBLIGATORIO para enviar la imagen nueva
      var datos = new FormData(this);
      datos.append('accion', 'editar');

      $.ajax({
        url: 'operaciones_admin.php',
        type: 'POST',
        data: datos,
        contentType: false, // Importante
        processData: false, // Importante
        success: function(res) {
          if (res.trim() === "success") {
            alert("Datos actualizados correctamente");
            location.reload();
          } else {
            alert("Error: " + res);
          }
        }
      });
    });
    $('#formNuevoAdmin').on('submit', function(e) {
      e.preventDefault();

      // FormData captura TODO, incluyendo el archivo de imagen
      var datos = new FormData(this);
      datos.append('accion', 'nuevo');

      $.ajax({
        url: 'operaciones_admin.php',
        type: 'POST',
        data: datos,
        contentType: false, // Importante para enviar archivos
        processData: false, // Importante para enviar archivos
        success: function(res) {
          if (res.trim() === "success") {
            location.reload();
          } else {
            alert(res);
          }
        }
      });
    });

    // 2. FUNCIÓN PARA PREPARAR LA EDICIÓN (Cargar datos al modal)
    function prepararEdicion(id) {
      $.ajax({
        url: 'get_admin.php',
        type: 'POST',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(data) {
          // Llenamos los campos ocultos y visibles
          $('#edit_id').val(data.id_administrativo);
          $('#edit_nombre').val(data.nombre);
          $('#edit_apellido').val(data.apellido);
          $('#edit_correo').val(data.correo);
          $('#edit_area').val(data.area);
          $('#edit_telefono').val(data.telefono);
          $('#edit_usuario').val(data.usuario);

          // OPCIONAL: Mostrar una vista previa de la foto actual en el modal
          if (data.foto) {
            $('#img_previa_edit').attr('src', '../../dist/img/perfiles/' + data.foto);
          }

          // Mostramos el modal (Asegúrate de que el ID del modal sea modalEditar)
          $('#modalEditar').modal('show');
        },
        error: function() {
          alert("No se pudieron cargar los datos del administrativo.");
        }
      });
    }

    // 3. FUNCIÓN PARA ELIMINAR
    function eliminarAdministrativo(id) {
      if (confirm('¿Estás seguro de eliminar a este administrativo? Se borrará también su cuenta de acceso.')) {
        $.ajax({
          url: 'operaciones_admin.php',
          type: 'POST',
          data: {
            id_administrativo: id,
            accion: 'eliminar' // IMPORTANTE: Esto le dice al PHP qué hacer
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