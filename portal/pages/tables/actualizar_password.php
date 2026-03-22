<?php
session_start();
include "../../conexion.php";

// Evita que se acceda al archivo si no hay una petición POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usuario = $_SESSION['id_usuario'];
    $pass_actual = $_POST['pass_actual'];
    $pass_nueva = $_POST['pass_nueva'];

    // 1. Consultar con una consulta preparada (más seguro)
    $stmt = $conexion->prepare("SELECT contraseña FROM usuarios WHERE id_usuario = ?");
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $dato = $resultado->fetch_assoc();

    if ($dato) {
        // 2. Verificar usando el hash moderno
        if (password_verify($pass_actual, $dato['contraseña'])) {
            
            // 3. Encriptar la nueva
            $nueva_encriptada = password_hash($pass_nueva, PASSWORD_DEFAULT);
            
            $update = $conexion->prepare("UPDATE usuarios SET contraseña = ? WHERE id_usuario = ?");
            $update->bind_param("si", $nueva_encriptada, $id_usuario);
            
            if ($update->execute()) {
                echo "success"; // Sin espacios alrededor
            } else {
                echo "Error al actualizar en la base de datos.";
            }
        } else {
            echo "La contraseña actual es incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
    exit; // Importante para que no mande nada más al cliente
}