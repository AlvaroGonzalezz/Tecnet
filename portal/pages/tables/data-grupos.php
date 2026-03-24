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
    <title>TecNet | Visualización de Docentes</title>
    <link rel="shortcut icon" href="../../../dist/img/tecneticon.png" type="image/x-icon">

    <link rel="stylesheet" href="https:  
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
                                    <a href="data-docentes.php" class="nav-link ">
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
                                    <a href="data-materias.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Asignaturas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="data-grupos.php" class="nav-link active">
                                        <i class="far fa-user nav-icon"></i>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Grupos Registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNuevoGrupo">
                                    <i class="fas fa-plus"></i> Nuevo Grupo
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Grupo (Semestre y Carrera)</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "../../conexion.php";
                                      
                                    $sql = "SELECT g.id_grupo, g.semestre, c.nombre_carrera 
                FROM grupo g 
                INNER JOIN carreras c ON g.id_carrera = c.id_carrera 
                ORDER BY g.semestre ASC";

                                    $res = mysqli_query($conexion, $sql);
                                    while ($f = mysqli_fetch_assoc($res)) {
                                          
                                        $sufijo = ($f['semestre'] == 1) ? "ero" : (($f['semestre'] == 2) ? "do" : "ero");
                                        $nombre_combinado = $f['semestre'] . $sufijo . " " . $f['nombre_carrera'];
                                    ?>
                                        <tr>
                                            <td><?php echo $f['id_grupo']; ?></td>
                                            <td><strong><?php echo $nombre_combinado; ?></strong></td>
                                            <td class="text-center">
                                                <button class="btn btn-danger btn-sm" onclick="eliminarGrupo(<?php echo $f['id_grupo']; ?>)">
                                                    <i class="fas fa-trash"></i> Eliminar
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
    <div class="modal fade" id="modalNuevoGrupo">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Registrar Nuevo Grupo</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <form id="formNuevoGrupo">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Carrera</label>
                            <select name="id_carrera" class="form-control" required>
                                <option value="">-- Seleccione Carrera --</option>
                                <?php
                                $query_c = mysqli_query($conexion, "SELECT * FROM carreras ORDER BY nombre_carrera ASC");
                                while ($c = mysqli_fetch_assoc($query_c)) {
                                    echo "<option value='" . $c['id_carrera'] . "'>" . $c['nombre_carrera'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Semestre</label>
                            <input type="number" name="semestre" class="form-control" min="1" max="12" placeholder="Ej. 3" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear Grupo</button>
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
          
        $('#formNuevoGrupo').on('submit', function(e) {
            e.preventDefault();
            $.post('operaciones_grupos.php', $(this).serialize() + '&accion=nuevo', function(res) {
                if (res.trim() === "success") {
                    location.reload();
                } else {
                    alert("Error: " + res);
                }
            });
        });

          
        function eliminarGrupo(id) {
            if (confirm('¿Seguro que deseas eliminar este grupo?')) {
                $.post('operaciones_grupos.php', {
                    id_grupo: id,
                    accion: 'eliminar'
                }, function(res) {
                    if (res.trim() === "success") {
                        location.reload();
                    }
                });
            }
        }
    </script>
</body>

</html>