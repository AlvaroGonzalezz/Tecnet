<?php
include 'conexion_local.php';
if(isset($_GET['id'])){
    echo "Existe la variable Mat";
    echo $_GET['id'];

    $mat = $_GET['id'];

    $sql = $conx -> query("DELETE FROM usuarios WHERE clave ='$mat'");
    if($sql){
        echo '<script>alert("Se elimino");location.href="index3.php?mensaje=Eliminado correctamente";</script>';
    }
}
else{
    echo "No existe la variable por get Mat";
}
/*
$mat = $_POST['mat'];
$nom = $_POST['name'];
$pate = $_POST['pate'];
$mate = $_POST['mate'];

//"INSERT INTO usuarios(clave, nombre, apellido_p, apellido_m) values('$mat','$nom', '$paterno', '$materno')"
$sql = $conx -> query("INSERT INTO usuarios(clave, nombre, apellido_p, apellido_m) values('$mat','$nom', '$pate', '$mate')");

if($sql){
    echo "Guardo :)";
}
else{
    echo "No guardo :(";
}
*/
?>
