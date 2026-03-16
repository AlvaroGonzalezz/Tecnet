<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Documentación | TecNet</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../dist/css/style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="dist/img/tecneticon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="dist/img/tecneticon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="dist/img/tecneticon.png">
    <link rel="shortcut icon" type="image/x-icon" href="dist/img/tecneticon.png">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="../boldo-1.0.0/public/assets/css/theme.css" rel="stylesheet" />
</head>

<body>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column; /* Para que el nav no tape el contenido */
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: linear-gradient(to right, #233abd, #2d3a81);
        }

        .ficha .container {
            position: relative;
            max-width: 700px;
            width: 100%;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-top: 80px; /* Espacio para el nav fixed */
        }

        .ficha .container header {
            font-size: 1.5rem;
            color: #333;
            font-weight: 500;
            text-align: center;
        }

        .ficha .container .form {
            margin-top: 30px;
        }

        .ficha .form .input-box {
            width: 100%;
            margin-top: 20px;
        }

        .ficha .input-box label {
            color: #333;
        }

        .form :where(.input-box input) {
            position: relative;
            height: 50px;
            width: 100%;
            outline: none;
            font-size: 1rem;
            color: #707070;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 10px 15px;
        }

        .ficha .form button {
            height: 55px;
            width: 100%;
            color: #fff;
            font-size: 1rem;
            font-weight: 400;
            margin-top: 30px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            border: 1px solid #206ed4;
            background-color: #2e6fd1;
        }

        .ficha .form button:hover {
            background: rgb(88, 56, 250);
        }
    </style>

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container">
            <a class="navbar-brand" href="../index.html"><img src="../dist/img/logotecnet.png" alt="" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars text-white fs-3"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item"><a class="nav-link" href="../index.html">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="../AcercaDe.html">Acerca de</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="ficha">
        <section class="container">
            <header>Carga de mis Documentos</header>
            
            <form action="procesar_documentos.php" method="POST" enctype="multipart/form-data" class="form">
                
                <input type="hidden" name="id_alumno" value="<?php echo $_GET['id'] ?? ''; ?>">

                <div class="input-box">
                    <label>CURP (Escribe tus 18 caracteres)</label>
                    <input type="text" name="curp_texto" placeholder="Ingresa tu CURP" maxlength="18" required />
                </div>

                <div class="input-box">
                    <label>Comprobante de pago (Recibo)</label>
                    <input type="file" name="recibos_pago" required />
                </div>

                <div class="input-box">
                    <label>CURP (Archivo PDF)</label>
                    <input type="file" name="curp_archivo" required />
                </div>

                <div class="input-box">
                    <label>Constancia de Seguro Médico</label>
                    <input type="file" name="seguro_medico" required />
                </div>

                <div class="input-box">
                    <label>Comprobante de domicilio</label>
                    <input type="file" name="comprobante_domicilio" required />
                </div>

                <button type="submit">Finalizar Registro</button>
            </form>
        </section>
    </div>
</body>

</html>