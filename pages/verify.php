<?php

session_start();
require "conexion.php";

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sql = "
SELECT u.*, 
a.correo AS correo_alumno,
d.correo AS correo_docente,
ad.correo AS correo_admin
FROM usuarios u
LEFT JOIN alumnos a ON u.id_alumno = a.id_alumno
LEFT JOIN docentes d ON u.id_docente = d.id_docente
LEFT JOIN administrativos ad ON u.id_administrativo = ad.id_administrativo
WHERE u.usuario = ?
";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("s",$usuario);
$stmt->execute();

$resultado = $stmt->get_result();

if($resultado->num_rows > 0){

    $datos = $resultado->fetch_assoc();

    if(password_verify($password,$datos['contraseña'])){

        $_SESSION['usuario'] = $datos['usuario'];
        $_SESSION['rol'] = $datos['id_rol'];

        header("Location: dashboard.php");

    }else{
        echo "Contraseña incorrecta";
    }

}else{
    echo "Usuario no encontrado";
}

?>