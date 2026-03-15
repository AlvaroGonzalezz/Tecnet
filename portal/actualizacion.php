<?php
    include 'conexion_local.php';
    if(isset($_GET['id'])){
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
        <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<style>
    table{
        height: 50%;
        width: 50%;
        margin: 20px auto;
    }
    th, td{
        border: 1px solid #f5f5;
        text-align: left;
        padding: 8px;
    }
    th{
        background-color: #f4f4f4;
    }
    
</style>
<body>
    <form action="insertar.php" method="post">
        <label for="mat">Matricula</label><input type="text" id="mat" name="mat" class="form-control"><br>
        <label for="name">Nombre</label><input type="text" id="name" name="name" class="form-control"><br>
        <label for="pate">Paterno</label><input type="text" id="pate" name="pate" class="form-control"><br>
        <label for="mate">Materno</label><input type="text" id="mate" name="mate" class="form-control"><br>
        <label for="cal">calificacion</label><input type="text" id="cal" name="cal" class="form-control"><br>
        </div>
        </div>
        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary">

    </form>

    <div>
        <table>
            
        </table>
    </div>
</body>
</html>

<?php
    }
    else{
        echo '<script>location.href="insertarUsuario.php?mensaje=Accion no valida";</script>';
    }
    ?>