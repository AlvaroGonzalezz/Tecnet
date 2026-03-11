<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TecNet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../dist/css/style.css">

    
    <link rel="apple-touch-icon" sizes="180x180" href="dist/img/tecneticon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="dist/img/tecneticon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="dist/img/tecneticon.png">
    <link rel="shortcut icon" type="image/x-icon" href="dist/img/tecneticon.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="../dist/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="../boldo-1.0.0/public/assets/css/theme.css" rel="stylesheet" />

</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}
        body {
	background: #ffffff;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100vh;
	margin: -20px 0 50px;
}
    </style>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="../dist/img/logotecnet.png" alt="" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa-solid fa-bars text-white fs-3"></i></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
              <li class="nav-item"><a class="nav-link" aria-current="page" href="../index.html">Inicio</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="../AcercaDe.html">Acerca de</a></li>
              
              
            </ul>
          </div>
        </div>
      </nav>
    <div class="login">
        <br> <br><br>

        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="#">
                    <h1>¿Olvidaste tu contraseña?</h1>
                   
                    <br><span>Ingresa tu correo para recuperar tu contraseña</span>
                    <input type="email" placeholder="Correo" />
                   
                    <button>Recuperar</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="#">
                    <h1>Inicia Sesion</h1>
                    
                    <span>ingresa tus datos</span>
                    <input type="email" placeholder="Correo" />
                    <input type="password" placeholder="Contraseña" />
                    <button>Inicia Sesion</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Inicia tu sesion</h1>
                        <p>Pulsa el boton para iniciar tu sesion</p>
                        <button class="ghost" id="signIn">Iniciar sesion</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>¿Olvidaste tus datos?</h1>
                        <p>Pulsa el boton para recuperar tu contraseña</p>
                        <button class="ghost" id="signUp">Recuperar</button>
                    </div>
                </div>
            </div>
        </div>

        
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
</body>

</html>