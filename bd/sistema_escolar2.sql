-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2026 a las 03:22:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_escolar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrativo`
--

CREATE TABLE `administrativo` (
  `id_administrativo` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT 'default.png',
  `correo` varchar(100) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrativo`
--

INSERT INTO `administrativo` (`id_administrativo`, `nombre`, `apellido`, `telefono`, `foto`, `correo`, `area`) VALUES
(1, 'Alvaro', 'Sánchez González', '8721259032', '1773792129_1.png', 'alvaro@tecsanpedro.edu.mx', 'Control Escolar'),
(11, 'Demetrio', 'Zuñiga Sánchez', '8712312312', '1773791904_11.jpg', 'demetrio@tecsanpedro.edu.mx', 'General'),
(12, 'Nestor', 'Perez Salas', '8721412323', '1773792096_nestor@tecsanpedro.edu.mx.jpg', 'nestor@tecsanpedro.edu.mx', 'Vinculación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `fotografia` varchar(255) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `carga_academica` int(11) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  `id_administrativo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `nombre`, `apellido`, `curp`, `fecha_nacimiento`, `direccion`, `telefono`, `correo`, `fotografia`, `estado`, `carga_academica`, `id_grupo`, `id_carrera`, `id_administrativo`) VALUES
(1, 'Juan Carlos', 'Perez Gonzalez', 'PEGJ010203HCLRRN09', '2001-02-03', 'Av. Juarez 120, Col. Centro, San Pedro, Coahuila', '8714445566', 'juan.perez@alumnos.tecnologico.edu.mx', 'juan_perez.jpg', 'Activo', 5, 1, 1, 1),
(2, 'Alfredo', 'Salazar Escobar', 'SAGA040905HCLNNLA1', '2000-01-01', 'Av. Margaritas Col. San Isidro SP', '87212412315', 'alfredo@gmail.com', 'default.png', 'Activo', NULL, NULL, 1, NULL),
(3, 'Ovidio', 'Lopez Franco', 'OLF70101', '2000-03-01', 'Av. Tecnologico San Pedro Coah.', '8412312412', 'ovidio@gmail.com', 'default.png', 'Activo', NULL, NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aspirantes`
--

CREATE TABLE `aspirantes` (
  `id_aspirante` int(11) NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `id_carrera_opcion1` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aspirantes`
--

INSERT INTO `aspirantes` (`id_aspirante`, `correo`, `curp`, `id_carrera_opcion1`, `nombre`, `apellido`, `telefono`, `fecha_nacimiento`, `direccion`, `foto`, `fecha_registro`) VALUES
(1, 'ana.lopez2026@gmail.com', 'LOPA050612MCLPRN04', 1, 'Ana Sofia', 'Lopez Alvarez', '8713332211', '2005-06-12', 'Col. Las Rosas, San Pedro, Coahuila', 'ana_lopez.jpg', '2026-03-10'),
(2, 'alvaro@gmail.com', 'SAGA1241231232A', 1, 'Alvaro', 'Sánchez González', '87212412312', '2000-01-01', 'Av. 213', NULL, '2026-03-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id_calificacion` int(11) NOT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `parcial1` decimal(5,2) DEFAULT NULL,
  `parcial2` decimal(5,2) DEFAULT NULL,
  `parcial3` decimal(5,2) DEFAULT NULL,
  `parcial4` decimal(5,2) DEFAULT NULL,
  `parcial5` decimal(5,2) DEFAULT NULL,
  `parcial6` decimal(5,2) DEFAULT NULL,
  `parcial7` decimal(5,2) DEFAULT NULL,
  `final` decimal(5,2) DEFAULT NULL,
  `promedio` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id_calificacion`, `id_alumno`, `id_materia`, `parcial1`, `parcial2`, `parcial3`, `parcial4`, `parcial5`, `parcial6`, `parcial7`, `final`, `promedio`) VALUES
(1, 1, 1, 8.50, 9.00, 8.00, 9.50, 8.50, 9.00, 9.00, 9.00, 8.86);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL,
  `nombre_carrera` varchar(150) DEFAULT NULL,
  `duracion_semestres` int(11) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `nombre_carrera`, `duracion_semestres`, `estado`) VALUES
(1, 'Ingeniería en Sistemas Computacionales', 8, 'Activa'),
(2, 'Ingeniería Industrial', 9, 'Activo'),
(3, 'Ingeniería en Logística', 9, 'Activo'),
(4, 'Ingeniería en Gestión Empresarial', 9, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `id_director` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`id_director`, `nombre`, `apellido`, `telefono`, `correo`) VALUES
(1, 'Carlos Alberto', 'Ramirez Torres', '8711234567', 'carlos.ramirez@tecnologico.edu.mx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id_docente` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT 'default.png',
  `correo` varchar(100) DEFAULT NULL,
  `id_director` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id_docente`, `nombre`, `apellido`, `telefono`, `foto`, `correo`, `id_director`) VALUES
(4, 'Roman', 'Gonzalez Peña', '151231231', '1773792219_doc_4.jpg', 'roman@tecsanpedro.edu.mx', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentacion`
--

CREATE TABLE `documentacion` (
  `id_documento` int(11) NOT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `recibos_pago` varchar(255) DEFAULT NULL,
  `curp` varchar(50) DEFAULT NULL,
  `seguro_medico` varchar(255) DEFAULT NULL,
  `comprobante_domicilio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documentacion`
--

INSERT INTO `documentacion` (`id_documento`, `id_alumno`, `recibos_pago`, `curp`, `seguro_medico`, `comprobante_domicilio`) VALUES
(1, 1, 'recibo_inscripcion_2026.pdf', 'PEGJ010203HCLRRN09', 'seguro_imss.pdf', 'comprobante_domicilio_juan.pdf'),
(2, NULL, 'documentos_aspirantes/SAGA1241231232A/1773704921_Rocka1.jpg', 'SAGA1241231232A', 'documentos_aspirantes/SAGA1241231232A/1773704921_ad.jpg', 'documentos_aspirantes/SAGA1241231232A/1773704921_ExamenU1_Alvaro.jpg'),
(3, NULL, 'documentos_aspirantes/SAGA040905HCLNNLA1/1773793264_comprobante.webp', 'SAGA040905HCLNNLA1', 'documentos_aspirantes/SAGA040905HCLNNLA1/1773793264_calificaciones.pdf', 'documentos_aspirantes/SAGA040905HCLNNLA1/1773793264_comprobante.webp'),
(4, NULL, 'documentos_aspirantes/OLF70101/1773795830_comprobante.webp', 'OLF70101', 'documentos_aspirantes/OLF70101/1773795830_Examen_Alvaro.pdf', 'documentos_aspirantes/OLF70101/1773795830_comprobante.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas_admision`
--

CREATE TABLE `fichas_admision` (
  `id_ficha` int(11) NOT NULL,
  `id_aspirante` int(11) DEFAULT NULL,
  `folio` varchar(50) DEFAULT NULL,
  `fecha_generacion` date DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fichas_admision`
--

INSERT INTO `fichas_admision` (`id_ficha`, `id_aspirante`, `folio`, `fecha_generacion`, `monto`, `estado`) VALUES
(1, 1, 'ADM-2026-0001', '2026-03-12', 500.00, 'Pendiente de pago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `sesion_grupo` varchar(50) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `id_director` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `sesion_grupo`, `semestre`, `id_director`) VALUES
(1, 'Matutino', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_academico`
--

CREATE TABLE `historial_academico` (
  `id_historial` int(11) NOT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `id_docente` int(11) DEFAULT NULL,
  `periodo` varchar(50) DEFAULT NULL,
  `calificacion_final` decimal(5,2) DEFAULT NULL,
  `promedio` decimal(5,2) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_academico`
--

INSERT INTO `historial_academico` (`id_historial`, `id_alumno`, `id_materia`, `id_docente`, `periodo`, `calificacion_final`, `promedio`, `estado`, `fecha_registro`) VALUES
(1, 1, 1, 1, '2026-1', 9.00, 8.86, 'Aprobado', '2026-03-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id_inscripcion` int(11) NOT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `id_docente` int(11) DEFAULT NULL,
  `periodo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id_inscripcion`, `id_alumno`, `id_materia`, `id_docente`, `periodo`) VALUES
(1, 1, 1, 1, '2026-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(100) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `creditos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nombre_materia`, `semestre`, `creditos`) VALUES
(1, 'Fundamentos de Programación', 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `id_ficha` int(11) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `metodo_pago` varchar(50) DEFAULT NULL,
  `comprobante` varchar(255) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `estado_validacion` varchar(50) DEFAULT NULL,
  `id_administrativo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `id_ficha`, `monto`, `metodo_pago`, `comprobante`, `fecha_pago`, `estado_validacion`, `id_administrativo`) VALUES
(1, 1, 500.00, 'Transferencia bancaria', 'transferencia_ficha_0001.jpg', '2026-03-13', 'En revisión', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Alumno'),
(3, 'Docente'),
(4, 'Director'),
(5, 'Aspirante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_docente` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_administrativo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `contraseña`, `id_rol`, `id_docente`, `id_alumno`, `id_administrativo`) VALUES
(1, 'juan.perez', '123456', 1, NULL, NULL, 1),
(4, 'ulises@tecsanpedro.edu.mx', '$2y$10$e8axfSmj/GGZ9vBznjTtj.xIrDSzrd.VztDERsq5..KSPPFGZAfdS', 3, NULL, NULL, 4),
(7, 'ulises2@tecsanpedro.edu.mx', '$2y$10$icyDT9CxnyN9fcxPuod6eOApYMCKBOEQr5G2SCfGEyO/e5Og27T36', 3, NULL, NULL, 7),
(9, 'ulises23@tecsanpedro.edu.mx', '$2y$10$Ra6Uz6/uI/xMkyTj6jtak.rn0y1EkYLmPzaWErM1Pgc5ulm1K..7y', 3, NULL, NULL, 9),
(13, 'roman@tecsanpedro.edu.mx', '$2y$10$RsdxShnRm6vDlLFJjJXAaOLcjl6H8vzXeTt2O9nYCJ1z5YjXnFuGO', 3, 4, NULL, NULL),
(14, 'demetrio@tecsanpedro.edu.mx', '$2y$10$S0I9FaYZ0eRMS6WrcHLB..XSimCNzcH3u/yIB7osanFpfuCaYvR8S', 4, NULL, NULL, 11),
(15, 'nestor@tecsanpedro.edu.mx', '$2y$10$iafcZR1IgT6jYeZEClvrQ.l6oduBd0Vwl5E93JucBTjO9XqkZJby.', 1, NULL, NULL, 12),
(16, 'alfredo@gmail.com', '$2y$10$2Jp3ninZsN6cprPI8MqSt.ZBp3cQcVYmE8cAEL6p6hOe784sVAhHS', 2, NULL, 2, NULL),
(17, 'ovidio@gmail.com', '$2y$10$8O1WaXBW4CdslGqMB0cZW.f8tDIrsOmf9uf1JR9LhCShOddtzmDkG', 2, NULL, 3, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrativo`
--
ALTER TABLE `administrativo`
  ADD PRIMARY KEY (`id_administrativo`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_carrera` (`id_carrera`),
  ADD KEY `id_administrativo` (`id_administrativo`);

--
-- Indices de la tabla `aspirantes`
--
ALTER TABLE `aspirantes`
  ADD PRIMARY KEY (`id_aspirante`),
  ADD KEY `id_carrera_opcion1` (`id_carrera_opcion1`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id_director`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id_docente`),
  ADD KEY `id_director` (`id_director`);

--
-- Indices de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `fichas_admision`
--
ALTER TABLE `fichas_admision`
  ADD PRIMARY KEY (`id_ficha`),
  ADD KEY `id_aspirante` (`id_aspirante`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `id_director` (`id_director`);

--
-- Indices de la tabla `historial_academico`
--
ALTER TABLE `historial_academico`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_docente` (`id_docente`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id_inscripcion`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_docente` (`id_docente`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_ficha` (`id_ficha`),
  ADD KEY `id_administrativo` (`id_administrativo`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_docente` (`id_docente`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_administrativo` (`id_administrativo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrativo`
--
ALTER TABLE `administrativo`
  MODIFY `id_administrativo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `aspirantes`
--
ALTER TABLE `aspirantes`
  MODIFY `id_aspirante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `director`
--
ALTER TABLE `director`
  MODIFY `id_director` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `fichas_admision`
--
ALTER TABLE `fichas_admision`
  MODIFY `id_ficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `historial_academico`
--
ALTER TABLE `historial_academico`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`),
  ADD CONSTRAINT `2` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`),
  ADD CONSTRAINT `3` FOREIGN KEY (`id_administrativo`) REFERENCES `administrativo` (`id_administrativo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
