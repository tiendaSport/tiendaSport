-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2024 a las 01:51:32
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
-- Base de datos: `tiendasport`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `cargo_id` int(11) NOT NULL,
  `cargo_nombre` varchar(250) NOT NULL,
  `cargo_descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`cargo_id`, `cargo_nombre`, `cargo_descripcion`) VALUES
(1, 'Administrador', 'Usuario con permisos especiales en el sitio web, tales como administrar a otros usuarios, cargar productos, modificar precios, etc.'),
(3, 'Genérico', 'Usuario que sólo tiene acceso al catálogo de productos, puede comprar, buscar productos, etc.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritodecompras`
--

CREATE TABLE `carritodecompras` (
  `usuario_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `categoria_nombre`) VALUES
(1, 'Indumentaria'),
(2, 'Calzado'),
(3, 'Accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportes`
--

CREATE TABLE `deportes` (
  `deporte_id` int(11) NOT NULL,
  `deporte_nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `deportes`
--

INSERT INTO `deportes` (`deporte_id`, `deporte_nombre`) VALUES
(1, 'Tenis'),
(2, 'Boxeo'),
(3, 'Fútbol'),
(4, 'Rugby'),
(5, 'Baseball');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_pedidos`
--

CREATE TABLE `estados_pedidos` (
  `estado_id` int(11) NOT NULL,
  `estado_nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados_pedidos`
--

INSERT INTO `estados_pedidos` (`estado_id`, `estado_nombre`) VALUES
(1, 'Pagado'),
(2, 'Enviado'),
(3, 'Recibido'),
(4, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialdecompras`
--

CREATE TABLE `historialdecompras` (
  `compra_id` int(11) NOT NULL,
  `compra_pedido` int(11) NOT NULL,
  `compra_usuario` int(11) NOT NULL,
  `compra_fechayhora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historialdecompras`
--

INSERT INTO `historialdecompras` (`compra_id`, `compra_pedido`, `compra_usuario`, `compra_fechayhora`) VALUES
(5, 1, 2, '2024-08-19 21:04:15'),
(6, 1, 2, '2024-08-19 21:04:20'),
(7, 2, 2, '2024-08-19 21:16:06'),
(8, 3, 2, '2024-08-20 08:18:02'),
(9, 3, 2, '2024-08-20 08:18:08'),
(10, 4, 2, '2024-08-20 08:50:07'),
(11, 5, 2, '2024-08-21 19:27:15'),
(12, 6, 6, '2024-08-21 20:40:20'),
(13, 6, 6, '2024-08-21 20:40:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `marca_id` int(11) NOT NULL,
  `marca_nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`marca_id`, `marca_nombre`) VALUES
(1, 'Adidas'),
(2, 'Rebook'),
(3, 'Converse'),
(4, 'DC'),
(5, 'Everlast'),
(6, 'Jordan'),
(7, 'Cleto Reyes'),
(8, 'New Balance'),
(9, 'No posee'),
(10, 'Olympikus'),
(11, 'Proyec'),
(12, 'Corti');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `oferta_id` int(11) NOT NULL,
  `oferta_producto` int(11) NOT NULL,
  `oferta_precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `pedido_id` int(11) NOT NULL,
  `pedido_usuario` int(11) NOT NULL,
  `pedido_precio` double NOT NULL,
  `pedido_estado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`pedido_id`, `pedido_usuario`, `pedido_precio`, `pedido_estado`) VALUES
(1, 2, 34995, 3),
(2, 2, 9995, 2),
(3, 2, 34995, 2),
(4, 2, 9995, 2),
(5, 2, 9995, 2),
(6, 6, 14995, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_productos`
--

CREATE TABLE `pedidos_productos` (
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos_productos`
--

INSERT INTO `pedidos_productos` (`pedido_id`, `producto_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(3, 1),
(3, 3),
(4, 1),
(5, 1),
(6, 1),
(6, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(11) NOT NULL,
  `producto_codigo` varchar(250) NOT NULL,
  `producto_nombre` varchar(250) NOT NULL,
  `producto_descripcion` varchar(250) NOT NULL,
  `producto_stock` int(11) NOT NULL,
  `producto_precio` double NOT NULL,
  `producto_categoria` int(11) NOT NULL,
  `producto_deporte` int(11) NOT NULL,
  `producto_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `producto_codigo`, `producto_nombre`, `producto_descripcion`, `producto_stock`, `producto_precio`, `producto_categoria`, `producto_deporte`, `producto_marca`) VALUES
(1, '12o3u3o3ihjt1', 'guantes everlast', 'son guantes de boxeo excelentes\r\n', 4, 9995, 3, 2, 5),
(2, '192048723081249990', 'Pelota de fútbol amateur', 'pelota de fútbol para jugar al futbol', 80, 13000, 3, 3, 9),
(3, '343897082947873728799', 'pelota de rugby', 'excelente ', 26, 25000, 3, 4, 2),
(4, '81208372014930', 'pack pelotas de tenis x3', 'para jugar al tenis.', 15, 8000, 3, 1, 7),
(5, '78332432334', 'Raqueta', 'Para jugar al tenis', 4, 13000, 3, 1, 3),
(6, '2382388', 'vendas de boxeo', 'largo: 5 mts.', 50, 5000, 3, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nombre` varchar(250) NOT NULL,
  `usuario_apellido` varchar(250) NOT NULL,
  `usuario_email` varchar(250) NOT NULL,
  `usuario_clave` varchar(250) NOT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nombre`, `usuario_apellido`, `usuario_email`, `usuario_clave`, `id_cargo`) VALUES
(2, 'Fausto', 'Díaz Carmody', '0800fau@gmail.com', '$2y$10$SyAORgjMEFlHejqAYaasHOqHf2h2fAwNJ56rMWtUjGgbmN.Z5T0Qa', 1),
(4, 'INET', 'No posee', 'direccion.inet@educacion.gob.ar', '$2y$10$dU2g.wV2ulhU4GtbbHnHDO6SkPbANCB2AKWEOkNA9JbTDUMsJlJXW', 3),
(5, 'Tienda', 'Sport', 'admin@gmail.com', '$2y$10$SJ6DWNCEMZ2xfIwjB9496OokS8p9fROIASPobqWp21Hl4tP04j5oy', 1),
(6, 'Fausto', 'Díaz Carmody', 'evengg18@gmail.com', '$2y$10$hkQutpt4Hkd0KfCOyOKrL.KCv0ukLt57KKZdei1fWEoXGBMaa7BLG', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`cargo_id`);

--
-- Indices de la tabla `carritodecompras`
--
ALTER TABLE `carritodecompras`
  ADD KEY `usuario_id` (`usuario_id`,`producto_id`),
  ADD KEY `productoCarrito` (`producto_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `deportes`
--
ALTER TABLE `deportes`
  ADD PRIMARY KEY (`deporte_id`);

--
-- Indices de la tabla `estados_pedidos`
--
ALTER TABLE `estados_pedidos`
  ADD PRIMARY KEY (`estado_id`);

--
-- Indices de la tabla `historialdecompras`
--
ALTER TABLE `historialdecompras`
  ADD PRIMARY KEY (`compra_id`),
  ADD KEY `compra_producto` (`compra_pedido`),
  ADD KEY `compra_usuario` (`compra_usuario`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`marca_id`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`oferta_id`),
  ADD KEY `oferta_producto` (`oferta_producto`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`pedido_id`),
  ADD KEY `pedido_producto` (`pedido_usuario`),
  ADD KEY `pedido_estado` (`pedido_estado`),
  ADD KEY `pedido_estado_2` (`pedido_estado`);

--
-- Indices de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD KEY `pedido_id` (`pedido_id`,`producto_id`),
  ADD KEY `pedido_producto` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `producto_categoria` (`producto_categoria`,`producto_deporte`),
  ADD KEY `deporte_producto` (`producto_deporte`),
  ADD KEY `producto_marca` (`producto_marca`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `cargo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `deportes`
--
ALTER TABLE `deportes`
  MODIFY `deporte_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estados_pedidos`
--
ALTER TABLE `estados_pedidos`
  MODIFY `estado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `historialdecompras`
--
ALTER TABLE `historialdecompras`
  MODIFY `compra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `marca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `oferta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carritodecompras`
--
ALTER TABLE `carritodecompras`
  ADD CONSTRAINT `productoCarrito` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`),
  ADD CONSTRAINT `usuarioCarrito` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`);

--
-- Filtros para la tabla `historialdecompras`
--
ALTER TABLE `historialdecompras`
  ADD CONSTRAINT `comprador` FOREIGN KEY (`compra_usuario`) REFERENCES `usuarios` (`usuario_id`),
  ADD CONSTRAINT `pedido` FOREIGN KEY (`compra_pedido`) REFERENCES `pedidos` (`pedido_id`);

--
-- Filtros para la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD CONSTRAINT `enOferta` FOREIGN KEY (`oferta_producto`) REFERENCES `productos` (`producto_id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `estadoDelPedido` FOREIGN KEY (`pedido_estado`) REFERENCES `estados_pedidos` (`estado_id`),
  ADD CONSTRAINT `pedido_usuario` FOREIGN KEY (`pedido_usuario`) REFERENCES `usuarios` (`usuario_id`);

--
-- Filtros para la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD CONSTRAINT `pedido_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`pedido_id`),
  ADD CONSTRAINT `pedido_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `categorias` FOREIGN KEY (`producto_categoria`) REFERENCES `categorias` (`categoria_id`),
  ADD CONSTRAINT `deporte_producto` FOREIGN KEY (`producto_deporte`) REFERENCES `deportes` (`deporte_id`),
  ADD CONSTRAINT `marcaDeProducto` FOREIGN KEY (`producto_marca`) REFERENCES `marcas` (`marca_id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `rangoDelUsuario` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`cargo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
