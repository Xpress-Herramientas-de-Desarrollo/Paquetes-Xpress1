-- Base de datos: bd_xpress

CREATE DATABASE IF NOT EXISTS `bd_xpress`;
USE `bd_xpress`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------
-- Tabla: usuarios
-- --------------------------------------------------------
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(100) NOT NULL,
  `correo_usuario` varchar(100) NOT NULL,
  `contra_usuario` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Tabla: clientes
-- --------------------------------------------------------
CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Tabla: agencias
-- --------------------------------------------------------
CREATE TABLE `agencias` (
  `id_agencia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `horario_atencion` varchar(100) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_agencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Tabla: envios
-- --------------------------------------------------------
CREATE TABLE `envios` (
  `id_envio` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_tarifa` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `origen` varchar(255) NOT NULL,
  `destino` varchar(255) NOT NULL,
  `distancia_km` decimal(8,2) NOT NULL,
  `peso_paquete` decimal(8,2) NOT NULL,
  `costo_total` decimal(10,2) NOT NULL,
  `estado_envio` enum('Pendiente','En tránsito','Entregado') DEFAULT 'Pendiente',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_envio`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_tarifa` (`id_tarifa`),
  KEY `id_vehiculo` (`id_vehiculo`),
  CONSTRAINT `envios_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  CONSTRAINT `envios_ibfk_2` FOREIGN KEY (`id_tarifa`) REFERENCES `tarifas` (`id_tarifa`),
  CONSTRAINT `envios_ibfk_3` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Tabla: tarifas
-- --------------------------------------------------------
CREATE TABLE `tarifas` (
  `id_tarifa` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `peso_min` decimal(8,2) NOT NULL,
  `peso_max` decimal(8,2) NOT NULL,
  `costo_base` decimal(10,2) NOT NULL,
  `costo_por_km` decimal(10,2) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_tarifa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Datos para la tabla tarifas
INSERT INTO `tarifas` (`id_tarifa`, `descripcion`, `peso_min`, `peso_max`, `costo_base`, `costo_por_km`, `fecha_registro`) VALUES
(1, 'Pequeño (0-1kg)', 0.00, 1.00, 5.00, 0.50, '2025-10-20 19:05:24'),
(2, 'Mediano (1-5kg)', 1.00, 5.00, 8.00, 0.70, '2025-10-20 19:05:24'),
(3, 'Grande (5-20kg)', 5.00, 20.00, 12.00, 1.00, '2025-10-20 19:05:24');

-- --------------------------------------------------------
-- Tabla: vehiculos
-- --------------------------------------------------------
CREATE TABLE `vehiculos` (
  `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(10) NOT NULL,
  `tipo` enum('Moto','Auto','Camioneta','Camión') NOT NULL,
  `capacidad` decimal(8,2) DEFAULT NULL,
  `estado` enum('Disponible','En uso','Mantenimiento') DEFAULT 'Disponible',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_vehiculo`),
  UNIQUE KEY `placa` (`placa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Datos para la tabla vehiculos
INSERT INTO `vehiculos` (`id_vehiculo`, `placa`, `tipo`, `capacidad`, `estado`, `fecha_registro`) VALUES
(1, 'ABC-123', 'Moto', 20.00, 'Disponible', '2025-10-20 19:05:24'),
(2, 'XYZ-456', 'Camioneta', 200.00, 'En uso', '2025-10-20 19:05:24');

COMMIT;
