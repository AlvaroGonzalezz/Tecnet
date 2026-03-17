<?php
require "../../conexion.php";

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    // IMPORTANTE: Buscamos en 'docente' y pegamos con 'usuarios' por el id_docente
    $sql = "SELECT d.*, u.usuario 
            FROM docente d 
            LEFT JOIN usuarios u ON d.id_docente = u.id_docente 
            WHERE d.id_docente = ?";
            
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $datos = $resultado->fetch_assoc();

    // Enviamos los datos como JSON a Javascript
    echo json_encode($datos);
}
?>