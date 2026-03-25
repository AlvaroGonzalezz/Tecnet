<?php
session_start();

if (isset($_SESSION['id_usuario'])) {
    header("Location: ../portal/dashboard_director.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TecNet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../dist/css/style.css">


    <link rel="apple-touch-icon" sizes="180x180" href="../dist/img/tecneticon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../dist/img/tecneticon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../dist/img/tecneticon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../dist/img/tecneticon.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="../dist/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="../boldo-1.0.0/public/assets/css/theme.css" rel="stylesheet" />

</head>

<body>
    <style>
        @media (min-width: 992px) {
            .btn-regresar-independiente {
                display: none;
            }

            .tec {
                display: none;
            }
        }

        @media (max-width: 768px) {

            .navbar {
                display: none !important;
            }

            .btn-regresar-independiente {
                position: absolute;
                top: 20px;
                left: 20px;
                z-index: 9999;
                color: #0a2640;
                text-decoration: none;
                font-weight: 700;
                font-size: 14px;
                display: flex;
                align-items: center;
                gap: 8px;
                background: rgba(255, 255, 255, 0.8);
                padding: 8px 15px;
                border-radius: 30px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }

            .btn-regresar-independiente i {
                font-size: 20px;
                color: #0a2640;
            }

            body {
                padding-top: 0 !important;
                height: 100vh;
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .container {
                width: 90% !important;
                margin: 0 auto;
                border-radius: 15px;
                min-height: 450px;
            }

            .overlay-container {
                display: none !important;
            }

            .form-container {
                width: 100% !important;
                position: relative !important;
                left: 0 !important;
            }

            .sign-up-container {
                display: none;
            }

            .container.right-panel-active .sign-in-container {
                display: none;
            }

            .container.right-panel-active .sign-up-container {
                display: flex !important;
            }
        }
    </style>
    <a href="../index.html" class="btn-regresar-independiente d-lg-none">
        <i class="bi bi-arrow-left-circle-fill"></i> Volver al inicio
    </a>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            <a class="btn-volver-movil d-lg-none" href="../index.html">
                <i class="bi bi-arrow-left"></i> Volver
            </a>

            <a class="navbar-brand d-none d-lg-block" href="../index.html">
                <img src="../dist/img/logotecnet.png" alt="" />
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item"><a class="nav-link" href="../index.html">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="../pages/acercade.php">Acerca de</a></li>
                </ul>
            </div>
        </div>
    </nav><br><br><br><br><br><br>

    <div class="login">
        <br> <br><br><br><br><br>

        <div class="container" id="container">

            <div class="form-container sign-up-container">
                <form action="recuperar_password.php" method="POST">
                    <h1>¿Olvidaste tu contraseña?</h1>

                    <br>
                    <span class="fs-1">Para recuperar tu contraseña es necesario que acudas a Servicios Escolares</span>

                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="verify.php" method="POST"><br>
                    <img src="../dist/img/tecneticon.png" class="tec" alt="Tecnet Icon" style="width: 30%;">
                    <h1>Iniciar sesión</h1>

                    <span>Ingresa tus datos</span>

                    <input type="email" name="correo" placeholder="Correo" required>

                    <input type="password" name="password" placeholder="Contraseña" required>

                    <button type="submit">Iniciar sesión</button>

                </form>
            </div>

            <div class="overlay-container">
                <div class="overlay">

                    <div class="overlay-panel overlay-left">
                        <h1>Inicia tu sesión</h1>
                        <p>Pulsa el botón para iniciar sesión</p>
                        <button class="ghost" id="signIn">Iniciar sesión</button>
                    </div>

                    <div class="overlay-panel overlay-right">
                        <h1>¿Olvidaste tus datos?</h1>
                        <p>Pulsa el botón para recuperar tu contraseña</p>
                        <button class="ghost" id="signUp">Recuperar</button>
                    </div>

                </div>
            </div>

        </div>
        <br><br>

    </div>

    <script src="../dist/js/script.js"></script>
    <script src="boldo-1.0.0/public/vendors/popper/popper.min.js"></script>
    <script src="boldo-1.0.0/public/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="boldo-1.0.0/public/vendors/anchorjs/anchor.min.js"></script>
    <script src="boldo-1.0.0/public/vendors/is/is.min.js"></script>
    <script src="boldo-1.0.0/public/vendors/fontawesome/all.min.js"></script>
    <script src="boldo-1.0.0/public/vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="boldo-1.0.0/public/vendors/prism/prism.js"></script>
    <script src="boldo-1.0.0/public/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="boldo-1.0.0/public/assets/js/theme.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../portal/plugins/sweetalert2/sweetalert2.all.js"></script>

    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const error = urlParams.get('error');

            if (error === '1') {
                Swal.fire({
                    icon: 'error',
                    title: 'Contraseña incorrecta',
                    text: 'La contraseña que ingresaste no es válida. Inténtalo de nuevo.',
                    confirmButtonColor: '#0a2640'
                });
            } else if (error === '2') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Usuario no encontrado',
                    text: 'El correo electrónico no está registrado en nuestro sistema.',
                    confirmButtonColor: '#0a2640'
                });
            } else if (error === 'rol_desconocido') {
                Swal.fire({
                    icon: 'question',
                    title: 'Error de acceso',
                    text: 'Tu usuario no tiene un rol asignado válido.',
                    confirmButtonColor: '#0a2640'
                });
            }

            window.history.replaceState({}, document.title, window.location.pathname);
        };
    </script>
</body>

</html>