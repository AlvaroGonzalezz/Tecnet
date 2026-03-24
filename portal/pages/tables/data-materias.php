<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../pages/login.php");
    exit();
}
$nombre_usuario = $_SESSION['nombre_persona'];
$ruta_foto = "dist/img/perfiles/" . $_SESSION['foto_perfil'];

include "../../conexion.php";
$res_docentes = mysqli_query($conexion, "SELECT id_docente, nombre, apellido FROM docente ORDER BY nombre ASC");
$docentes_array = [];
while ($d = mysqli_fetch_assoc($res_docentes)) {
    $docentes_array[] = $d;
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TecNet | Visualización de Docentes</title>
    <link rel="shortcut icon" href="../../../dist/img/tecneticon.png" type="image/x-icon">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

    <style>
        .img-perfil-tabla {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
        }

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
                                    <a href="#" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
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
                                    <a href="#" class="nav-link active">
                                        <i class="far fa-user nav-icon"></i>
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

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <h1>Gestión de Materias</h1>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Listado de las Asignaturas</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAltaMateria">
                                    <i class="fas fa-plus-circle"></i> Nueva Materia
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="tablaMaterias" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Semestre</th>
                                        <th>Créditos</th>
                                        <th>Docente Asignado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "../../conexion.php";
                                    // Consulta a la tabla materias
                                    // Consulta con JOIN para traer el nombre del profesor
                                    $sql = "SELECT m.*, d.nombre, d.apellido 
        FROM materias m 
        LEFT JOIN docente d ON m.id_docente = d.id_docente 
        ORDER BY m.semestre ASC, m.nombre_materia ASC";
                                    $resultado = mysqli_query($conexion, $sql);

                                    while ($fila = mysqli_fetch_assoc($resultado)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $fila['id_materia']; ?></td>
                                            <td><?php echo $fila['nombre_materia']; ?></td>
                                            <td><?php echo $fila['semestre']; ?>°</td>
                                            <td><?php echo $fila['creditos']; ?></td>
                                            <td>
                                                <?php echo ($fila['nombre']) . ' ' . $fila["apellido"] ? $fila['nombre'] . ' ' . $fila['apellido'] : '<span class="badge badge-danger">Sin asignar</span>'; ?>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-warning btn-sm"
                                                    onclick='prepararEdicionMateria(<?php echo json_encode($fila); ?>)'>
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="eliminarMateria(<?php echo $fila['id_materia']; ?>)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="modal fade" id="modalAltaMateria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-book"></i> Registrar Nueva Materia</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formNuevaMateria">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nombre de la Materia</label>
                            <input type="text" name="nombre_materia" class="form-control" placeholder="Ej. Fundamentos de Programación" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Semestre</label>
                                    <input type="number" name="semestre" class="form-control" min="1" max="12" placeholder="1 - 12" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Créditos</label>
                                    <input type="number" name="creditos" class="form-control" min="1" placeholder="Ej. 8" required>
                                </div>
                                <div class="form-group">
                                    <label>Asignar Docente</label>
                                    <select name="id_docente" class="form-control" required>
                                        <option value="">-- Seleccione un profesor --</option>
                                        <?php foreach ($docentes_array as $doc) { ?>
                                            <option value="<?php echo $doc['id_docente']; ?>"><?php echo $doc['nombre'] . ' ' . $doc['apellido']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Materia</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEditarMateria" tabindex="-1" role="dialog" aria-labelledby="editarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="editarLabel"><i class="fas fa-edit"></i> Editar Materia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEditarMateria">
                    <div class="modal-body">
                        <input type="hidden" name="id_materia" id="edit_id_materia">

                        <div class="form-group">
                            <label>Nombre de la Materia</label>
                            <input type="text" name="nombre_materia" id="edit_nombre_materia" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Semestre</label>
                                    <input type="number" name="semestre" id="edit_semestre" class="form-control" min="1" max="12" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Créditos</label>
                                    <input type="number" name="creditos" id="edit_creditos" class="form-control" min="1" required>
                                </div>
                                <div class="form-group">
                                    <label>Asignar Docente</label>
                                    <select name="id_docente" class="form-control" required>
                                        <option value="">-- Seleccione un profesor --</option>
                                        <?php foreach ($docentes_array as $doc) { ?>
                                            <option value="<?php echo $doc['id_docente']; ?>"><?php echo $doc['nombre'] . ' ' . $doc['apellido']; ?></option>
                                        <?php } ?>
                                    </select>
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
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../dist/js/adminlte.min.js"></script>

    <script>
        $(function() {
            $("#tablaDocentesDirector").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
                }
            });
        });

        function prepararEdicionMateria(datos) {
            $('#edit_id_materia').val(datos.id_materia);
            $('#edit_nombre_materia').val(datos.nombre_materia);
            $('#edit_semestre').val(datos.semestre);
            $('#edit_creditos').val(datos.creditos);
            // Agregamos esta línea para que el select marque al profe actual
            $('#edit_id_docente').val(datos.id_docente);

            $('#modalEditarMateria').modal('show');
        }

        // 2. Función Eliminar
        function eliminarMateria(id) {
            if (confirm('¿Seguro que deseas eliminar esta materia?')) {
                $.post('operaciones_materia.php', {
                    id_materia: id,
                    accion: 'eliminar'
                }, function(res) {
                    if (res.trim() === "success") {
                        location.reload();
                    } else {
                        alert("Error al eliminar");
                    }
                });
            }
        }
        $('#formEditarMateria').on('submit', function(e) {
            e.preventDefault();

            var datos = $(this).serialize();
            datos += '&accion=editar'; // Le decimos al PHP que la acción es EDITAR

            $.ajax({
                url: 'operaciones_materia.php',
                type: 'POST',
                data: datos,
                success: function(res) {
                    if (res.trim() === "success") {
                        alert("Materia actualizada con éxito");
                        location.reload();
                    } else {
                        alert("Error al actualizar: " + res);
                    }
                },
                error: function() {
                    alert("Error de conexión al intentar actualizar.");
                }
            });
        });
        $('#formNuevaMateria').on('submit', function(e) {
            e.preventDefault(); // Evita que la página se recargue

            // Juntamos los datos del formulario
            var datos = $(this).serialize();
            datos += '&accion=nuevo'; // Le avisamos al PHP que queremos insertar

            $.ajax({
                url: 'operaciones_materia.php', // El archivo PHP que procesa
                type: 'POST',
                data: datos,
                success: function(res) {
                    console.log("Respuesta servidor:", res); // Para depurar en consola
                    if (res.trim() === "success") {
                        alert("Materia guardada correctamente");
                        location.reload(); // Recarga la tabla para ver el cambio
                    } else {
                        alert("Error al guardar: " + res);
                    }
                },
                error: function() {
                    alert("Error crítico: No se pudo contactar con el servidor.");
                }
            });
        });
    </script>
</body>

</html>