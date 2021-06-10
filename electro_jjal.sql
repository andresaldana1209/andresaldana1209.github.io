--
-- Base de datos: `electro_jjal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admini`
--

CREATE TABLE `admini` (
  `nom` varchar(10) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admini`
--

INSERT INTO `admini` (`nom`, `pass`) VALUES
('admin', ''),
('admin', '123123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `IDCategoria` int(10) NOT NULL,
  `Nombre_cat` varchar(45) NOT NULL,
  `Imagen_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IDCategoria`, `Nombre_cat`, `Imagen_cat`) VALUES
(1, 'Refrigeracion', 'https://i.pinimg.com/736x/c7/03/75/c70375ce54a199cb792ceb89bc997c7f.jpg'),
(2, 'Lavado y Secado', 'https://blog.balay.es/wp-content/uploads/2020/12/secar-rapido-secadora.jpg'),
(3, 'Cocina', 'https://alianzaalimentaria.org/user/pages/08.blog/21.coccion-y-cambio-en-la-composicion-de-los-alimentos/janko-ferlic-KwU5Cl0LSXs-unsplash.jpg'),
(4, 'Ventiladores', 'https://www.tiendaoi.com/wp-content/uploads/2020/05/4venti-10pulg.jpg'),
(5, 'Hornos microondas', 'https://blog.torrey.net/hubfs/20200220%20-%20Torrey%20-%20Diferencias%20entre%20microondas%20dom%C3%A9sticos%20y%20comerciales.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID_Cliente` int(10) NOT NULL,
  `Cedula` int(15) NOT NULL,
  `Nombre_Cli` varchar(50) NOT NULL,
  `Apellido_Cli` varchar(50) NOT NULL,
  `Celular_Cli` bigint(20) NOT NULL,
  `Direccion_Cli` varchar(255) NOT NULL,
  `Contraseña` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID_Cliente`, `Cedula`, `Nombre_Cli`, `Apellido_Cli`, `Celular_Cli`, `Direccion_Cli`, `Contraseña`) VALUES
(8, 1005627096, 'Andrés', 'Aldana Salazar', 3148601341, 'Kra 9A N27 D', '123123123'),
(9, 23049420, 'Luis Alfonso', 'Gonzales Selsa', 3148601341, 'calle 3 - 12 villa mady', '13131313'),
(14, 1111111111, 'Felipe', 'Salazar', 3148601341, 'Kra 9A N27 D', ''),
(17, 123456789, 'Andres', 'Aldana', 3122122121, 'sincelejo', ''),
(21, 1234, '¿ Felipe', ' Salazar', 3148601341, 'Kra 9A N27 D', '\011222211111\01\02\03\0f\0d\0s11'),
(22, 2147483647, 'FELIPE', ' SALAZAR', 3148601341, 'KRA 9A N27 D', '$2y$10$5u4.kHWOlQ0b7fnM7LhX6unC9Jmcu4I/c90j9a/Ai/2TjoW.Ww0Ua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto`
--

CREATE TABLE `concepto` (
  `Id_concepto` bigint(20) NOT NULL,
  `Id_Venta` int(10) NOT NULL,
  `IDProducto` int(40) NOT NULL,
  `Precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `concepto`
--

INSERT INTO `concepto` (`Id_concepto`, `Id_Venta`, `IDProducto`, `Precio`) VALUES
(1, 1, 3, 118900),
(2, 2, 3, 118900),
(3, 3, 3, 118900),
(4, 4, 3, 118900),
(5, 5, 3, 118900),
(6, 5, 2, 855000),
(7, 5, 8, 3175900),
(8, 6, 4, 248900),
(9, 6, 3, 118900);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IDProducto` int(40) NOT NULL,
  `Codigo_Prod` bigint(50) NOT NULL,
  `Nombre_p` varchar(100) NOT NULL,
  `Foto_P` varchar(300) NOT NULL,
  `Descripcion` varchar(300) NOT NULL,
  `Marca` varchar(20) NOT NULL,
  `Stock` int(20) NOT NULL,
  `Precio` double NOT NULL,
  `Garantia` varchar(50) NOT NULL,
  `Ventas_P` double NOT NULL,
  `IdProveedor` int(10) NOT NULL,
  `IdCategoria` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IDProducto`, `Codigo_Prod`, `Nombre_p`, `Foto_P`, `Descripcion`, `Marca`, `Stock`, `Precio`, `Garantia`, `Ventas_P`, `IdProveedor`, `IdCategoria`) VALUES
(2, 56342387, 'Nevera Haceb Convencional 220 Litros Titanio', 'https://hacebco.vteximg.com.br/arquivos/ids/159798-500-500/N-AUSTRIA-220-CE-1P-DA-TI_7704353395372_--1-.png?v=637051235399870000', 'Tipo de RefrigeraciÃƒÆ’Ã‚Â³n:FrostCapacidad neta congelador:39,72 LtsCapacidad neta refrigerador:165,25 LtsMaterial De Las Bandejas:PlasticoTipo de iluminaciÃƒÆ’Ã‚Â³n:LEDPanel Digital:NoControl De Temperatura:ManualCantidad Puertas:1', 'Haceb', 0, 855000, '5 años', 1, 5, 2),
(3, 100825533, 'Ventilador Pared Samurái 16 Pulgadas', 'https://falabella.scene7.com/is/image/FalabellaCO/5683623_1?wid=800&hei=800&qlt=70', 'Nuevo ventilador samurai air protec maxx, con su nueva potencia de 60 watt que le garantiza un mayor flujo de aire sin aumentar el ruido. su hélice de 4 aspas brinda mayor cantidad de aire en las habitaciones, salas, oficinas, comedores, etc.', 'Samurai ', 432, 118900, '24 meses', 3, 4, 4),
(4, 100129717, 'Horno Microondas Kalley 20L K-Mw07n Negro', 'https://www.alkosto.com/medias/7705946173858-001-750Wx750H?context=bWFzdGVyfGltYWdlc3wzMzg3N3xpbWFnZS9qcGVnfGltYWdlcy9oMTEvaDA1LzkwNjkwNDQ2NjIzMDIuanBnfDhiNGRhYmIzY2FiZjhlNmQwNzVmMjM2MzUxNjNjMGQxZWJjMjNjYjMwYTgwNzQ3NzYyZWQ0ODliM2Y1ZGFmYjQ', 'Potencia: 700 watts.\r\nCapacidad de 0.7 pies cúbicos (20 litros).\r\nSeñal sonora de terminación.\r\nSistema de plato giratorio.\r\n10 niveles ajustables de cocción.\r\n', 'Kalley ', 225, 248900, '24 meses', 9, 3, 5),
(7, 1724620, 'Lavadora carga superior 17 kg LG WT17DSBP', 'https://exitocol.vtexassets.com/arquivos/ids/7566442-800-auto?width=800&height=auto&aspect=true', 'Motor Smart Inverter con Smart Motion y 10 años de garantía en el motor.\r\nTecnología Turbo Drum™.\r\nSmart Diagnosis.\r\nFiltro de pelusas inteligente.\r\nOpción de Lavado Diferido y Air Dry.\r\nDiseño sofisticado con Tapa de vidrio templado y Soft Closing Door.', 'Samsung', 456, 1439940, '10 años', 0, 2, 2),
(8, 100795056, 'Nevera Lg No Frost 403 Litros Lb41wpp', 'https://exitocol.vtexassets.com/arquivos/ids/7066895-800-auto?width=800&height=auto&aspect=true', 'Nevera LG No Frost 403 Litros Lb41wpp\r\nDeleita tus sentidos con NatureFRESH\r\nDisfruta tus alimentos y productos frescos. Deleita tus sentidos para una experiencia alegre de comida.\r\nLINEAR Cooling: Mantén la comida fresca durante más tiempo\r\n\r\n\r\n', 'LG', 86, 3175900, '12 meses', 0, 6, 1),
(9, 1695142, 'Aire Acondicionado Samsung 12.000 BTU 220V - AR12TVFZAWK', 'https://exitocol.vtexassets.com/arquivos/ids/6158601-800-auto?width=800&height=auto&aspect=true', '220 VVOLTAJE12000 BTUCAPACIDAD ENFRIAMIENTO136,26 kWh/mesCONSUMO ENERGÃ‰TICO82 x 30 x 21.5 cmUNIDAD INTERNA72 x 54.8 x 26.5 cmUNIDAD EXTERNAEasy Filter Plus(antibacteriano)FILTRO', 'LG', 876, 1409045, '12 meses', 0, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `IDProveedor` int(10) NOT NULL,
  `Nombre_Provee` varchar(50) NOT NULL,
  `Celular_Provee` bigint(20) NOT NULL,
  `Correo_Provee` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`IDProveedor`, `Nombre_Provee`, `Celular_Provee`, `Correo_Provee`) VALUES
(1, 'Sony', 312323212, 'Sony@gmail.com'),
(2, 'Samsung', 3453456754, 'Samsung@gmail.com'),
(3, 'Kalley', 18000111448, 'contactos.kalley@corbeta.com.co'),
(4, 'Samurai', 313649734, 'atencionalcliente@groupeseb.com'),
(5, 'Haceb', 1800051100, 'asesor.servicio@haceb.com'),
(6, 'LG Corporation', 18000910683, 'Soportes.Tecnicos@Lg.com.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `Id_ventas` int(10) NOT NULL,
  `cedula` int(15) NOT NULL,
  `Fecha_V` datetime NOT NULL,
  `Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`Id_ventas`, `cedula`, `Fecha_V`, `Total`) VALUES
(1, 23049420, '2021-06-07 00:00:00', 4040890),
(2, 23049420, '2021-06-07 00:00:00', 4040890),
(3, 23049420, '2021-06-08 00:00:00', 4040890),
(4, 23049420, '2021-06-08 00:00:00', 4040890),
(5, 23049420, '2021-06-08 00:00:00', 4149800),
(6, 23049420, '2021-06-08 06:48:47', 367800);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IDCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_Cliente`),
  ADD UNIQUE KEY `Cedula` (`Cedula`);

--
-- Indices de la tabla `concepto`
--
ALTER TABLE `concepto`
  ADD PRIMARY KEY (`Id_concepto`),
  ADD KEY `Id_Venta` (`Id_Venta`),
  ADD KEY `IDProducto` (`IDProducto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IDProducto`),
  ADD UNIQUE KEY `Codigo_Prod` (`Codigo_Prod`),
  ADD KEY `IdProveedor` (`IdProveedor`),
  ADD KEY `IdCategoria` (`IdCategoria`) USING BTREE;

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`IDProveedor`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`Id_ventas`),
  ADD KEY `Cedula_C` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IDCategoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_Cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `concepto`
--
ALTER TABLE `concepto`
  MODIFY `Id_concepto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IDProducto` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `IDProveedor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `Id_ventas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `concepto`
--
ALTER TABLE `concepto`
  ADD CONSTRAINT `concepto_ibfk_1` FOREIGN KEY (`Id_Venta`) REFERENCES `ventas` (`Id_ventas`),
  ADD CONSTRAINT `concepto_ibfk_2` FOREIGN KEY (`IDProducto`) REFERENCES `producto` (`IDProducto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `Puede Tener` FOREIGN KEY (`IdProveedor`) REFERENCES `proveedor` (`IDProveedor`),
  ADD CONSTRAINT `Tiene` FOREIGN KEY (`IdCategoria`) REFERENCES `categorias` (`IDCategoria`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `cliente` (`Cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
