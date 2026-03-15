<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
<?php
include  'conexion_local.php';
$mat = $_POST['mat'];
$nom = $_POST['name'];
$pate = $_POST['pate'];
$mate = $_POST['mate'];
$cal = $_POST['cal'];

//"INSERT INTO usuarios(clave, nombre, apellido_p, apellido_m) values('$mat','$nom', '$paterno', '$materno')"
$sql = $conx -> query("INSERT INTO usuarios(clave, nombre, apellido_p, apellido_m, calificacion) values('$mat','$nom', '$pate', '$mate', '$cal')");

if($sql){
    echo "Guardo :)";
}
else{
    echo "No guardo :(";
}
?>