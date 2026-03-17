<?php
require "../../conexion.php";

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Unimos administrativo con usuarios para traer todo el perfil
    $sql = "SELECT a.*, u.usuario 
            FROM administrativo a 
            LEFT JOIN usuarios u ON a.id_administrativo = u.id_administrativo 
            WHERE a.id_administrativo = ?";
            
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $datos = $resultado->fetch_assoc();

    echo json_encode($datos);
}
?>