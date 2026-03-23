<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registro | TecNet</title>
    <!---Custom CSS File--->
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
        /* Import Google font - Poppins */
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
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: -webkit-linear-gradient(to right, #3344a5, #233abd);
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

        .form :where(.input-box input, .select-box) {
            position: relative;
            height: 50px;
            width: 100%;
            outline: none;
            font-size: 1rem;
            color: #707070;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 0 15px;
        }

        .ficha .input-box input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
        }

        .ficha .form .column {
            display: flex;
            column-gap: 15px;
        }

        .ficha .form .gender-box {
            margin-top: 20px;
        }

        .ficha .gender-box h3 {
            color: #333;
            font-size: 1rem;
            font-weight: 400;
            margin-bottom: 8px;
        }

        .ficha .form :where(.gender-option, .gender) {
            display: flex;
            align-items: center;
            column-gap: 50px;
            flex-wrap: wrap;
        }

        .ficha .form .gender {
            column-gap: 5px;
        }

        .ficha .gender input {
            accent-color: rgb(130, 106, 251);
        }

        .ficha .form :where(.gender input, .gender label) {
            cursor: pointer;
        }

        .ficha .gender label {
            color: #707070;
        }

        .ficha .address :where(input, .select-box) {
            margin-top: 15px;
        }

        .ficha .select-box select {
            height: 100%;
            width: 100%;
            outline: none;
            border: none;
            color: #707070;
            font-size: 1rem;
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

        /*Responsive*/
        @media screen and (max-width: 500px) {
            .ficha .form .column {
                flex-wrap: wrap;
            }

            .ficha .form :where(.gender-option, .gender) {
                row-gap: 15px;
            }
        }
    </style>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="../index.html"><img src="../dist/img/logotecnet.png" alt="" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa-solid fa-bars text-white fs-3"></i></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="../index.html">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="../pages/acercade.php">Acerca de</a></li>


                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <div class="ficha">
        <section class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <header>Registro TecNet</header>
            <form action="procesar_aspirante.php" method="POST" class="form" enctype="multipart/form-data">
                <div class="input-box">
                    <label>Nombre(s)</label>
                    <input type="text" name="nombre" placeholder="Ingresa nombre(s)" required />
                </div>

                <div class="input-box">
                    <label>Apellido(s)</label>
                    <input type="text" name="apellido" placeholder="Ingresa apellidos" required />
                </div>

                <div class="input-box">
                    <label>Correo Electrónico</label>
                    <input type="email" name="correo" placeholder="Ingresa dirección de correo" required />
                </div>

                <div class="column">
                    <div class="input-box">
                        <label>CURP</label>
                        <input type="text" name="curp" maxlength="18" placeholder="Ingresa CURP" required />
                    </div>
                    <div class="input-box">
                        <label>Teléfono</label>
                        <input type="text" name="telefono" maxlength="20" placeholder="Número telefónico" required />
                    </div>
                </div>

                <div class="column">
                    <div class="input-box">
                        <label>Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" required />
                    </div>
                    <div class="input-box">
                        <label>Carrera de Interés</label>
                        <select name="id_carrera_opcion1" required>
                            <option value="">Selecciona una carrera</option>
                            <option value="1">Ingeniería en Sistemas</option>
                            <option value="2">Ingeniería Industrial</option>
                            <option value="3">Ingeniería en Logística</option>
                            <option value="4">Ingeniería en Gestión Empresarial</option>
                        </select>
                    </div>
                </div>

                <div class="input-box address">
                    <label>Dirección</label>
                    <input type="text" name="direccion" placeholder="Calle, número y colonia" required />
                </div>

                <div class="input-box">
                    <label>Fotografía</label>
                    <input type="file" name="fotografia" required />
                </div>
                <button type="submit">Generar Ficha</button>
            </form>
        </section>
    </div>
</body>

</html>