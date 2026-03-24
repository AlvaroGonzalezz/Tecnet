<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../pages/login.php");
    exit();
}

require_once "../../conexion.php";

$nombre_usuario = $_SESSION['nombre_persona'];
$ruta_foto = "dist/img/perfiles/" . $_SESSION['foto_perfil'];
$id_usuario_sesion = $_SESSION['id_usuario'];

// CORRECCIÓN: Buscamos el ID real del docente vinculado al usuario de la sesión
$query_doc = mysqli_query($conexion, "SELECT id_docente FROM usuarios WHERE id_usuario = '$id_usuario_sesion'");
$datos_doc = mysqli_fetch_assoc($query_doc);

// Si no encuentra al docente, podrías tener un error, usamos el ID obtenido
$id_docente_logueado = ($datos_doc) ? $datos_doc['id_docente'] : 0;
$periodo_actual = "2026-1";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tecnet</title>
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
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <img src="../../../dist/img/tecneticon.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light" style="font-family: monospace;">TECNET</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../<?php echo $ruta_foto; ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $nombre_usuario; ?></a>
                        <small class="text-warning"><?php echo $_SESSION['nombre_rol']; ?></small>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="../../dashboard_docente.php" class="nav-link">
                                🏠
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                🧾
                                <p>Gestión <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="docente-alumnos.php" class="nav-link">
                                        <i class="far fa-circle nav-icon text-info"></i>
                                        <p>Mis alumnos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="docente-materias.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon text-success"></i>
                                        <p>Mis asignaturas</p>
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
                    <h2 class="mb-4">Mis Materias Asignadas</h2>
                </div>
            </section>

            <section class="content">
                <div class="card">
                    <div class="card-body">
                        <table id="tablaMaterias" class="table table-bordered table-striped shadow-sm tabla-dinamica">
                            <thead class="bg-dark">
                                <tr>
                                    <th>Materia</th>
                                    <th>Alumnos Inscritos</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT id_materia, nombre_materia, id_docente 
                                        FROM materias 
                                        WHERE id_docente = '$id_docente_logueado'";

                                $res = mysqli_query($conexion, $sql);
                                while ($f = mysqli_fetch_assoc($res)) {
                                    $id_m = $f['id_materia'];
                                    $conteo = mysqli_query($conexion, "SELECT COUNT(*) as total FROM inscripciones WHERE id_materia = '$id_m' AND periodo = '$periodo_actual'");
                                    $total = mysqli_fetch_assoc($conteo)['total'];
                                ?>
                                    <tr>
                                        <td><strong><?php echo $f['nombre_materia']; ?></strong></td>
                                        <td class="text-center">
                                            <span class="badge badge-info p-2" style="font-size: 0.9rem;">
                                                <i class="fas fa-users"></i> <?php echo $total; ?> Estudiantes
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-success btn-sm"
                                                onclick="abrirModal(<?php echo $f['id_materia']; ?>, <?php echo $f['id_docente']; ?>, '<?php echo addslashes($f['nombre_materia']); ?>')">
                                                <i class="fas fa-user-plus"></i>
                                            </button>

                                            <button class="btn btn-info btn-sm"
                                                onclick="abrirModalCalificaciones(<?php echo $f['id_materia']; ?>, '<?php echo addslashes($f['nombre_materia']); ?>')">
                                                <i class="fas fa-edit"></i> Calificar
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <div class="modal fade" id="modalCalificaciones" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">Calificaciones: <span id="nombreMateriaCalTxt"></span></h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <form id="formCalificaciones">
                    <div class="modal-body">
                        <input type="hidden" name="id_materia" id="id_materia_cal">

                        <div class="form-group mb-4">
                            <label>Seleccionar Estudiante Inscrito</label>
                            <select id="id_alumno_cal" name="id_alumno" class="form-control" required>
                            </select>
                        </div>

                        <div class="row">
                            <?php for ($i = 1; $i <= 7; $i++): ?>
                                <div class="col-md-3 mb-3">
                                    <label>Parcial <?php echo $i; ?></label>
                                    <input type="number" name="parcial<?php echo $i; ?>" class="form-control input-nota" step="0.1" min="0" max="10">
                                </div>
                            <?php endfor; ?>

                            <div class="col-md-3 mb-3">
                                <label class="text-primary font-weight-bold">Final</label>
                                <input type="number" name="final" class="form-control border-primary" step="0.1" min="0" max="10">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="text-success font-weight-bold">Promedio</label>
                                <input type="number" name="promedio" id="promedio_cal" class="form-control border-success bg-light" step="0.01" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="guardarCalificacion()">
                            <i class="fas fa-save"></i> Guardar Calificaciones
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalInscribir" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Inscribir en: <span id="nombreMateriaTxt" class="font-weight-bold"></span></h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="formInscribir">

                    <div class="modal-body">
                        <input type="hidden" name="id_materia" id="id_materia_form">
                        <input type="hidden" name="id_docente" id="id_docente_form">
                        <input type="hidden" name="periodo" id="periodo_form" value="<?php echo $periodo_actual; ?>">

                        <div class="form-group">
                            <label>Seleccionar Estudiante</label>
                            <select id="id_alumno_form" name="id_alumno" class="form-control" style="width: 100%;" required>
                                <option value="">Buscar por nombre...</option>
                                <?php
                                $alum = mysqli_query($conexion, "SELECT id_alumno, nombre, apellido FROM alumno ORDER BY apellido ASC");

                                while ($a = mysqli_fetch_assoc($alum)) {
                                    echo "<option value='" . $a['id_alumno'] . "'>" . $a['apellido'] . " " . $a['nombre'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="guardarInscripcion()">Confirmar Registro</button>
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
    <script>
        $(document).on('change', '#id_alumno_cal', function() {
            var idAlu = $(this).val();
            var idMat = $('#id_materia_cal').val();

            if (idAlu != "") {
                $.ajax({
                    url: 'obtener-calificaciones-alumno.php', // El archivo que consulta la BD
                    type: 'POST',
                    data: {
                        id_alumno: idAlu,
                        id_materia: idMat
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data) {
                            // Si hay datos, llenamos cada input
                            $('input[name="parcial1"]').val(data.parcial1);
                            $('input[name="parcial2"]').val(data.parcial2);
                            $('input[name="parcial3"]').val(data.parcial3);
                            $('input[name="parcial4"]').val(data.parcial4);
                            $('input[name="parcial5"]').val(data.parcial5);
                            $('input[name="parcial6"]').val(data.parcial6);
                            $('input[name="parcial7"]').val(data.parcial7);
                            $('input[name="final"]').val(data.final);
                            $('#promedio_cal').val(data.promedio);
                        } else {
                            // Si no hay datos, limpiamos los campos para un nuevo registro
                            $('.input-nota, input[name="final"], #promedio_cal').val('');
                        }
                    },
                    error: function() {
                        console.log("Error al recuperar calificaciones");
                    }
                });
            }
        });
        $(document).on('input', '.input-nota', function() {
            calcularPromedio();
        });

        function calcularPromedio() {
            let suma = 0;
            let contador = 0;

            // Recorremos todos los inputs que tengan la clase 'input-nota'
            $('.input-nota').each(function() {
                let valor = parseFloat($(this).val());

                // Solo sumamos si el campo no está vacío y es un número válido
                if (!isNaN(valor) && valor !== "") {
                    suma += valor;
                    contador++;
                }
            });

            // Calculamos el promedio
            let promedio = (contador > 0) ? (suma / contador) : 0;

            // Lo mostramos en el input de promedio con 2 decimales
            $('#promedio_cal').val(promedio.toFixed(2));
        }
       $(document).ready(function() {
            // Inicializa todas las tablas que tengan esta clase
            $('.tabla-dinamica').DataTable({
                "responsive": true,
                "autoWidth": false,
                "dom": 'Bfrtip', // Muestra los botones de exportación
                "buttons": [{
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i> Excel',
                        className: 'btn btn-success'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        className: 'btn btn-danger'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i> Imprimir'
                    }
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                }
            });
        });

        // 2. FUNCIÓN GLOBAL (Afuera del ready para que el botón la encuentre)
        function abrirModal(idMateria, idDocente, nombre) {
            console.log("Abriendo materia:", nombre); // Verifica en F12 si esto sale

            // Asignamos valores
            $('#id_materia_form').val(idMateria);
            $('#id_docente_form').val(idDocente);
            $('#nombreMateriaTxt').text(nombre);

            // Abrimos el modal
            $('#modalInscribir').modal('show');
        }

        function abrirModalCalificaciones(idMateria, nombre) {
            $('#id_materia_cal').val(idMateria);
            $('#nombreMateriaCalTxt').text(nombre);

            // LIMPIAR CAMPOS ANTES DE MOSTRAR
            $('#formCalificaciones')[0].reset();
            $('#promedio_cal').val('');

            $.ajax({
                url: 'obtener-inscritos.php',
                type: 'POST',
                data: {
                    id_materia: idMateria
                },
                success: function(data) {
                    $('#id_alumno_cal').html(data);
                    $('#modalCalificaciones').modal('show');
                }
            });
        }

        function guardarCalificacion() {
            const datos = $('#formCalificaciones').serialize(); // Captura todos los parciales

            $.ajax({
                url: 'procesar-calificacion.php',
                type: 'POST',
                data: datos,
                success: function(res) {
                    if (res.trim() === "success") {
                        alert("✅ Calificaciones guardadas.");
                        $('#modalCalificaciones').modal('hide');
                    } else {
                        alert("Error: " + res);
                    }
                }
            });
        }

        function guardarInscripcion() {
            const id_a = $('#id_alumno_form').val();

            if (!id_a) {
                alert("Por favor, selecciona un alumno.");
                return;
            }

            const datos = {
                id_materia: $('#id_materia_form').val(),
                id_docente: $('#id_docente_form').val(),
                id_alumno: id_a,
                periodo: $('#periodo_form').val()
            };

            $.ajax({
                url: 'procesar-inscripcion.php',
                type: 'POST',
                data: datos,
                success: function(respuesta) {
                    // Limpiamos la respuesta de espacios o saltos de línea
                    var res = respuesta.trim();

                    console.log("Servidor dice: '" + res + "'"); // Revisa esto en la consola (F12)

                    if (res === "success") {
                        alert("✅ Inscripción exitosa");
                        location.reload();
                    } else if (res === "Ya registrado") {
                        alert("⚠️ El alumno ya está en esta clase.");
                    } else {
                        // Si entra aquí es porque el PHP mandó algo que no es "success"
                        alert("Hubo un detalle: " + res);
                    }
                }
            });
        }
       
         
    </script>
</body>

</html>