-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-07-2024 a las 05:31:26
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comida_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comida_indonesia`
--
CREATE TABLE `comida_mexicana` (
 `id` int NOT NULL AUTO_INCREMENT,
 `ci_nombre` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
 `ci_tipo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
 `ci_precio` decimal(10,2) DEFAULT NULL,
 `ci_ingredientes` text COLLATE utf8mb4_general_ci DEFAULT NULL,
 `ci_region` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
 `ci_calorias` int DEFAULT NULL,
 `ci_tiempo_preparacion` int DEFAULT NULL,
 `ci_fecha_introduccion` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
 `ci_estado` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
 `ci_chef_id` int DEFAULT NULL,
 `ci_restaurante_id` int DEFAULT NULL,
 `ci_contacto` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
 `ci_descripcion` text COLLATE utf8mb4_general_ci DEFAULT NULL,
 `ci_popularidad` int DEFAULT NULL,
 `ci_comentarios` text COLLATE utf8mb4_general_ci DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `comida_indonesia`
--
INSERT INTO `comida_mexicana` (`id`, `ci_nombre`, `ci_tipo`, `ci_precio`, `ci_ingredientes`, `ci_region`, `ci_calorias`, `ci_tiempo_preparacion`, `ci_fecha_introduccion`, `ci_estado`, `ci_chef_id`, `ci_restaurante_id`, `ci_contacto`, `ci_descripcion`, `ci_popularidad`, `ci_comentarios`) VALUES
('1', 'Tacos al Pastor', 'Plato
Principal', '7.00', 'Cerdo, piña, cebolla, cilantro, tortilla', 'Ciudad de México', '500', '25', '2019-08-01', 'Disponible',
'401', '501', 'contacto@restauratemexicano.com', 'Tacos de cerdo adobado con piña', '95', 'Sabrosos'),
 ('2', 'Guacamole', 'Entrada', '5.00',
'Aguacate, cebolla, tomate, limón, cilantro', 'Jalisco', '250', '15', '2020-05-15', 'Disponible', '402', '502',
'contacto@restauratemexicano.com', 'Puré de aguacate con vegetales', '90', 'Muy fresco'),
('3', 'Enchiladas', 'Plato Principal',
'10.00', 'Pollo, tortilla, salsa roja, queso', 'Puebla', '600', '40', '2021-10-10', 'Disponible', '403', '503',
'contacto@restauratemexicano.com', 'Tortillas rellenas con salsa', '85', 'Picantes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE login_recuperatorio (
 `cuenta_correo` VARCHAR(255) PRIMARY KEY,
 `nombre_usuario` VARCHAR(255),
 `password_hash` VARCHAR(255),
 `registration_date` VARCHAR(255)
 );


--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `login_recuperatorio` (`cuenta_correo`, `nombre_usuario`, `password_hash`, `registration_date`) VALUES
('admin@admin.com', 'Carlos', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', "2024-07-18");
INSERT INTO `login_recuperatorio` (`cuenta_correo`, `nombre_usuario`, `password_hash`, `registration_date`) VALUES
('pol@pol.com', 'Pol', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', "2024-07-18");