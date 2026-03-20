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
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TecNet | Visualización de Estudiantes</title>
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
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

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
                                    <a href="data-alumnos.php" class="nav-link active">
                                        <i class="far fa-user nav-icon"></i>
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
                            <a href="../calendar.html" class="nav-link">
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

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <h1>Consulta de Estudiantes</h1>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Listado General (Modo Lectura)</h3>
                        </div>
                        <div class="card-body">
                            <table id="tablaDocentesDirector" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre Completo</th>
                                        <th>Grupo</th>
                                        <th>Estado</th>
                                        <th>Correo</th>
                                        <th>Teléfono</th>
                                        <th style="width: 15%;" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "../../conexion.php";
                                    $sql = "SELECT 
            a.id_alumno, 
            a.nombre, 
            a.apellido, 
            a.correo, 
            a.telefono, 
            a.fotografia, 
            a.estado,
            g.semestre,             
            c.nombre_carrera,        
            u.usuario 
        FROM alumno a
        LEFT JOIN usuarios u ON a.id_alumno = u.id_alumno
        LEFT JOIN grupo g ON a.id_grupo = g.id_grupo      -- Unión con grupos
        LEFT JOIN carreras c ON g.id_carrera = c.id_carrera -- Unión con carreras
        ORDER BY a.apellido ASC";

                                    $res = mysqli_query($conexion, $sql);
                                    while ($fila = mysqli_fetch_assoc($res)) {
                                        $foto = !empty($fila['fotografia']) ? $fila['fotografia'] : 'default.png';                                    ?>
                                        <tr>
                                            <td><?php echo $fila['nombre'] . " " . $fila['apellido']; ?></td>
                                            <td>
                                                <?php
                                                if (!empty($fila['nombre_carrera'])) {
                                                    $sem = $fila['semestre'];
                                                    $sufijo = ($sem == 1) ? "ero" : (($sem == 2) ? "do" : "ero");

                                                    echo "<strong>" . $sem . $sufijo . " " . $fila['nombre_carrera'] . "</strong>";
                                                } else {
                                                    echo '<span class="badge badge-secondary">Sin Grupo Asignado</span>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $color = ($fila['estado'] == 'Activo') ? 'success' : 'danger';
                                                echo '<span class="badge badge-' . $color . '">' . $fila['estado'] . '</span>';
                                                ?>
                                            </td>
                                            <td><?php echo $fila['correo'] ?></td>

                                            <td><?php echo $fila['telefono'] ?></td>
                                            <td>
                                                <button class="btn btn-warning btn-sm"
                                                    onclick='prepararEdicionAlumno(<?php echo json_encode($fila); ?>)'>
                                                    <i class="fas fa-edit"></i> Editar
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
    <div class="modal fade" id="modalEditarAlumno">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formEditarAlumno">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title">Gestionar Alumno: <span id="nombre_titulo"></span></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_alumno" id="edit_id_alumno">

                        <div class="form-group">
                            <label>Estatus Académico</label>
                            <select name="estado" id="edit_estado" class="form-control">
                                <option value="Activo">Activo</option>
                                <option value="Baja Temporal">Baja Temporal</option>
                                <option value="Egresado">Egresado</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Asignar a Grupo</label>
                            <select name="id_grupo" id="edit_id_grupo" class="form-control">
                                <option value="">-- Sin Grupo --</option>
                                <?php
                                $grupos = mysqli_query($conexion, "SELECT g.id_grupo, g.semestre, c.nombre_carrera FROM grupo g INNER JOIN carreras c ON g.id_carrera = c.id_carrera");
                                while ($g = mysqli_fetch_assoc($grupos)) {
                                    echo "<option value='" . $g['id_grupo'] . "'>" . $g['semestre'] . "° " . $g['nombre_carrera'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Actualizar Alumno</button>
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
        function prepararEdicionAlumno(datos) {
            console.log("Datos recibidos:", datos); // Si esto no sale en la consola (F12), el botón no llama a la función

            // Llenamos los campos del modal usando los IDs del HTML
            $('#edit_id_alumno').val(datos.id_alumno);
            $('#edit_nombre').val(datos.nombre);
            $('#edit_apellido').val(datos.apellido);
            $('#edit_estado').val(datos.estado);
            $('#edit_id_grupo').val(datos.id_grupo);

            // Mostramos el modal
            $('#modalEditarAlumno').modal('show');
        }

        // Envío del formulario por AJAX
        $('#formEditarAlumno').on('submit', function(e) {
            e.preventDefault();
            $.post('operaciones_alumnos.php', $(this).serialize() + '&accion=editar_gestion', function(res) {
                if (res.trim() === "success") {
                    location.reload();
                }
            });
        });
    </script>
</body>

</html>