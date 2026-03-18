<?php
session_start();
require "conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // 1. Buscamos al usuario y su rol
    $sql = "SELECT u.*, r.nombre_rol 
            FROM usuarios u 
            INNER JOIN roles r ON u.id_rol = r.id_rol 
            WHERE u.usuario = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($usuario = $resultado->fetch_assoc()) {
        
        // 2. Verificamos la contraseña
        if (password_verify($password, $usuario['contraseña'])) {
            
            // Limpiar sesión previa
            session_unset();

            // 3. Variables de sesión base
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['usuario']    = $usuario['usuario'];
            $_SESSION['id_rol']     = $usuario['id_rol'];
            $_SESSION['nombre_rol'] = $usuario['nombre_rol'];

            // --- LÓGICA DE NOMBRE Y FOTO ---
            $nombre_display = "Usuario";
            $foto_display = "default.png";

            // ROL 1 (Admin) o 4 (Director) -> Tabla: administrativo
            if ($usuario['id_rol'] == 1 || $usuario['id_rol'] == 4) { 
                $id_adm = $usuario['id_administrativo']; // Cambiado a id_administrativo
                $res = $conexion->query("SELECT nombre, foto FROM administrativo WHERE id_administrativo = $id_adm");
                if($res && $d = $res->fetch_assoc()){
                    $nombre_display = $d['nombre'];
                    $foto_display = $d['foto'];
                }
            } 
            // ROL 2 (Alumno) -> Tabla: alumno
            else if ($usuario['id_rol'] == 2) { 
                $id_alu = $usuario['id_alumno'];
                $res = $conexion->query("SELECT nombre, fotografia FROM alumno WHERE id_alumno = $id_alu");
                if($res && $d = $res->fetch_assoc()){
                    $nombre_display = $d['nombre'];
                    $foto_display = $d['fotografia'];
                }
            } 
            // ROL 3 (Docente) -> Tabla: docente
            else if ($usuario['id_rol'] == 3) { 
                $id_doc = $usuario['id_docente'];
                $res = $conexion->query("SELECT nombre, foto FROM docente WHERE id_docente = $id_doc");
                if($res && $d = $res->fetch_assoc()){
                    $nombre_display = $d['nombre'];
                    $foto_display = $d['foto'];
                }
            }

            // Guardamos los datos finales en la sesión
            $_SESSION['nombre_persona'] = $nombre_display;
            $_SESSION['foto_perfil']    = (!empty($foto_display)) ? $foto_display : "default.png";

            // 4. Redirección final (Asegúrate que la carpeta 'portal' exista)
            switch ($usuario['id_rol']) {
                case 1: header("Location: ../portal/dashboard_admin.php"); break;
                case 2: header("Location: ../portal/dashboard_alumno.php"); break;
                case 3: header("Location: ../portal/dashboard_docente.php"); break;
                case 4: header("Location: ../portal/dashboard_director.php"); break;
                default: header("Location: login.php?error=rol_desconocido"); break;
            }
            exit();

        } else {
            header("Location: login.php?error=password_incorrecta");
            exit();
        }
    } else {
        header("Location: login.php?error=usuario_no_encontrado");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}