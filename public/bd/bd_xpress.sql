-- Crear base de datos
CREATE DATABASE IF NOT EXISTS bd_xpress CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE bd_xpress;

--------------------------------------------------------
--
-- Estructura de tabla para la tabla `agencias`
--

CREATE TABLE `agencias` (
  `id_agencia` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `horario_atencion` varchar(100) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id_incidencia` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `tipo` enum('Retraso','Paquete dañado','Dirección incorrecta','Otro') NOT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` enum('Pendiente','Resuelto') DEFAULT 'Pendiente',
  `fecha_incidencia` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `metodo_pago` enum('Efectivo','Tarjeta','Transferencia','Yape','Plin') NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `estado` enum('Pendiente','Pagado','Reembolsado') DEFAULT 'Pendiente',
  `fecha_pago` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_repartidor` int(11) DEFAULT NULL,
  `id_tarifa` int(11) DEFAULT NULL,
  `tipo_envio` enum('enviopuerta','enviolocal') NOT NULL,
  `nombre_remitente` varchar(100) DEFAULT NULL,
  `direccion_origen` varchar(255) NOT NULL,
  `ciudad_origen` varchar(50) NOT NULL,
  `direccion_destino` varchar(255) NOT NULL,
  `ciudad_destino` varchar(50) NOT NULL,
  `nombre_destinatario` varchar(100) DEFAULT NULL,
  `distancia_km` decimal(8,2) DEFAULT NULL,
  `peso` decimal(8,2) NOT NULL,
  `costo_total` decimal(10,2) DEFAULT NULL,
  `estado` enum('Solicitado','Preparándose','En agencia','En camino','Entregado','Cancelado') DEFAULT 'Solicitado',
  `fecha_pedido` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_programada` date DEFAULT NULL,
  `fecha_entrega` timestamp NULL DEFAULT NULL,
  `codigo_tracking` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repartidores`
--

CREATE TABLE `repartidores` (
  `id_repartidor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `vehiculo_asignado` varchar(50) DEFAULT NULL,
  `licencia_conduccion` varchar(30) DEFAULT NULL,
  `disponible` tinyint(1) DEFAULT 1,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `id_seguimiento` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `ubicacion_actual` varchar(255) DEFAULT NULL,
  `estado_actual` enum('Recibido','En preparación','En agencia','En tránsito','Entregado') DEFAULT 'Recibido',
  `observaciones` text DEFAULT NULL,
  `fecha_actualizacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `id_tarifa` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `peso_min` decimal(8,2) NOT NULL,
  `peso_max` decimal(8,2) NOT NULL,
  `costo_base` decimal(10,2) NOT NULL,
  `costo_por_km` decimal(10,2) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`id_tarifa`, `descripcion`, `peso_min`, `peso_max`, `costo_base`, `costo_por_km`, `fecha_registro`) VALUES
(1, 'Pequeño (0-1kg)', 0.00, 1.00, 5.00, 0.50, '2025-10-20 19:05:24'),
(2, 'Mediano (1-5kg)', 1.00, 5.00, 8.00, 0.70, '2025-10-20 19:05:24'),
(3, 'Grande (5-20kg)', 5.00, 20.00, 12.00, 1.00, '2025-10-20 19:05:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo` enum('admin','cliente','repartidor') NOT NULL DEFAULT 'cliente',
  `id_cliente` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_vehiculo` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `tipo` enum('Moto','Auto','Camioneta','Camión') NOT NULL,
  `capacidad` decimal(8,2) DEFAULT NULL,
  `estado` enum('Disponible','En uso','Mantenimiento') DEFAULT 'Disponible',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `placa`, `tipo`, `capacidad`, `estado`, `fecha_registro`) VALUES
(1, 'ABC-123', 'Moto', 20.00, 'Disponible', '2025-10-20 19:05:24'),
(2, 'XYZ-456', 'Camioneta', 200.00, 'En uso', '2025-10-20 19:05:24');

