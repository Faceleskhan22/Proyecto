-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2026 a las 16:48:59
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `technician_marketplace`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion`
--

CREATE TABLE `descripcion` (
  `id_descripcion` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `descripcion`
--

INSERT INTO `descripcion` (`id_descripcion`, `id_tecnico`, `mensaje`) VALUES
(1, 5, 'Soy una desarrolladora de software especializada en construir aplicaciones web dinámicas, robustas y completamente escalables. Mi enfoque combina lo mejor de dos mundos: la creación de interfaces de usuario fluidas e intuitivas en el Frontend, y el diseño de arquitecturas sólidas, seguras y eficientes en el Backend. Manejo con fluidez tecnologías clave como JavaScript, React, Node.js y bases de datos relacionales, lo que me permite transformar conceptos abstractos en productos digitales listos para el mercado. Mi objetivo es ayudar a empresas y startups a materializar sus ideas mediante un código limpio, optimizado y orientado a resultados. Si buscas una profesional comprometida con la excelencia técnica y la innovación constante, estoy lista para sumarme a tu próximo desafío.'),
(2, 6, 'Especialista en el diagnóstico, reparación y mantenimiento preventivo y correctivo de sistemas electromecánicos complejos. Mi experiencia abarca desde el montaje de tableros eléctricos y la programación de PLC, hasta la reparación de maquinaria pesada, sistemas hidráulicos y neumáticos. Combino el conocimiento técnico preciso con una gran capacidad para resolver fallas críticas bajo presión, garantizando siempre la continuidad operativa de la planta y la reducción de tiempos muertos. Ofrezco soluciones integrales de alta ingeniería para optimizar el rendimiento de líneas de producción y automatización industrial.'),
(3, 7, 'Ofrezco soluciones tecnológicas integrales para asegurar el correcto funcionamiento, la seguridad y la conectividad de la infraestructura digital de tu negocio. Me especializo en el armado y mantenimiento de servidores, configuración de redes locales (LAN/WLAN), auditorías de seguridad informática y respaldo de datos críticos. Mi enfoque está orientado a prevenir incidentes técnicos antes de que afecten la productividad, brindando un soporte rápido y eficiente tanto de forma presencial como remota. Si buscas optimizar los recursos tecnológicos de tu empresa y garantizar un entorno de trabajo digital seguro, estoy lista para ayudarte.'),
(4, 8, 'Me dedico a transformar ideas visuales en plataformas web interactivas, veloces y totalmente adaptables a cualquier dispositivo. Como programador, pongo mi foco en la experiencia del usuario y en la escritura de un código limpio, modular y fácil de mantener. Especializado en JavaScript y el ecosistema moderno de desarrollo web, combino la lógica de programación con una gran atención al detalle estético para crear sitios web corporativos, landing pages de alta conversión y aplicaciones web atractivas. Si tu marca necesita destacar en internet con una plataforma que no solo se vea bien, sino que funcione de manera impecable, estoy listo para desarrollarla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id_direccion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `localidad` varchar(40) NOT NULL,
  `calle` varchar(40) NOT NULL,
  `numero` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id_direccion`, `id_usuario`, `localidad`, `calle`, `numero`) VALUES
(1, 6, 'Lanus', '9 de julio', 1200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidad` int(11) NOT NULL,
  `nom_especialidad` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id_especialidad`, `nom_especialidad`) VALUES
(6, 'Automotriz'),
(3, 'Electricista'),
(2, 'Electromecanico'),
(1, 'Informatico'),
(4, 'Plomero'),
(7, 'Progamacion'),
(5, 'Redes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `nom_estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `nom_estado`) VALUES
(1, 'En Proceso'),
(2, 'Finalizado'),
(3, 'Sin Iniciar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_tecnico`, `id_usuario`, `id_estado`, `fecha`) VALUES
(1, 5, 1, 2, '2026-04-21'),
(2, 5, 2, 2, '2026-02-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id_cliente` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `pass` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseñas`
--

CREATE TABLE `reseñas` (
  `id_reseña` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `mensaje` text NOT NULL,
  `valoracion` decimal(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reseñas`
--

INSERT INTO `reseñas` (`id_reseña`, `id_usuario`, `id_tecnico`, `id_pedido`, `fecha`, `mensaje`, `valoracion`) VALUES
(2, 2, 5, 2, '2026-03-28', 'Lamentablemente la experiencia no fue la esperada. Si bien Sofía demuestra tener buenos conocimientos técnicos y el software final funciona bien, el proceso fue bastante frustrante. Tuvimos muchas demoras en las entregas pactadas y pasó varios días sin responder los mensajes ni dar actualizaciones del estado del proyecto, lo que nos generó retrasos en nuestro propio calendario de lanzamiento. Falta un poco más de compromiso con los tiempos del cliente y mejor organización en la comunicación.', 2.5),
(3, 1, 5, 1, '2026-04-30', 'Trabajar con Sofía en el desarrollo de nuestra plataforma web fue una experiencia impecable. Desde la primera reunión entendió perfectamente lo que necesitábamos y supo aportar ideas valiosas que mejoraron el diseño original. El código que entregó es limpio, el sitio vuela en velocidad y cumplió con los plazos de entrega de manera súper estricta. Además, destaca por su paciencia para explicar la parte técnica de forma sencilla. Sin duda la volveremos a contratar para la próxima etapa del proyecto. ¡Totalmente recomendada!', 5.0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE `tecnicos` (
  `id_tecnico` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `zona` varchar(50) NOT NULL,
  `valoracion_media` decimal(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`id_tecnico`, `nombre`, `apellido`, `id_especialidad`, `zona`, `valoracion_media`) VALUES
(5, 'Sofia', 'Pignataro', 7, 'Lanus', 4.0),
(6, 'Facundo', 'Garcia', 2, 'Lomas de Zamora', 5.0),
(7, 'Sol', 'Marin', 1, 'CABA', 3.5),
(8, 'Tobias', 'Frete', 7, 'CABA', 4.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nom_usuario` varchar(30) NOT NULL,
  `clave` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nom_usuario`, `clave`) VALUES
(1, 'gabi_corrado', 'nose'),
(2, 'luisss', 'sofiii'),
(6, 'tobi', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `descripcion`
--
ALTER TABLE `descripcion`
  ADD PRIMARY KEY (`id_descripcion`),
  ADD UNIQUE KEY `id_tecnico` (`id_tecnico`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidad`),
  ADD UNIQUE KEY `nom_especialidad` (`nom_especialidad`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`),
  ADD UNIQUE KEY `nom_estado` (`nom_estado`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_tecnico` (`id_tecnico`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD PRIMARY KEY (`id_reseña`),
  ADD KEY `id_tecnico` (`id_tecnico`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD PRIMARY KEY (`id_tecnico`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nom_usuario` (`nom_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `descripcion`
--
ALTER TABLE `descripcion`
  MODIFY `id_descripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  MODIFY `id_reseña` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  MODIFY `id_tecnico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `descripcion`
--
ALTER TABLE `descripcion`
  ADD CONSTRAINT `descripcion_ibfk_1` FOREIGN KEY (`id_tecnico`) REFERENCES `tecnicos` (`id_tecnico`);

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_tecnico`) REFERENCES `tecnicos` (`id_tecnico`),
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`);

--
-- Filtros para la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD CONSTRAINT `reseñas_ibfk_1` FOREIGN KEY (`id_tecnico`) REFERENCES `tecnicos` (`id_tecnico`),
  ADD CONSTRAINT `reseñas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `reseñas_ibfk_3` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`);

--
-- Filtros para la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD CONSTRAINT `tecnicos_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id_especialidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
