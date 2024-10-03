-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 09:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drivercom`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `ID_Equipo` int(11) NOT NULL,
  `Numero_Serie` varchar(100) NOT NULL,
  `Nombre_Equipo` varchar(100) NOT NULL,
  `Marca` varchar(50) DEFAULT NULL,
  `Categoria` varchar(200) NOT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `Ubicacion` varchar(100) DEFAULT NULL,
  `Fecha_Ingreso` varchar(20) NOT NULL,
  `Ingresado_Por` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`ID_Equipo`, `Numero_Serie`, `Nombre_Equipo`, `Marca`, `Categoria`, `Estado`, `Ubicacion`, `Fecha_Ingreso`, `Ingresado_Por`) VALUES
(1, 'SN123456', 'Laptop Dell XPS', 'Dell', 'Laptop', 'Disponible', 'Oficina 101', '2024-09-02 11:56:59', 1),
(4, 'ABC12345', 'Laptop Dell XPS', 'Dell', 'Computadora', 'Disponible', 'Oficina A', '2023-01-15', 0),
(5, 'XYZ67890', 'Proyector Epson', 'Epson', 'Proyector', 'Disponible', 'Sala de Reuniones', '2023-02-20', 0),
(6, 'LMN11223', 'Monitor Samsung', 'Samsung', 'Monitor', 'En Reparación', 'Oficina B', '2023-03-05', 0),
(7, 'RST33445', 'Impresora HP LaserJet', 'HP', 'Impresora', 'Disponible', 'Oficina C', '2023-04-12', 0),
(8, 'DEF55667', 'Teclado Logitech', 'Logitech', 'Accesorio', 'Prestado', 'Oficina D', '2023-05-25', 0),
(9, 'UVW77889', 'Mouse Logitech MX', 'Logitech', 'Accesorio', 'Disponible', 'Oficina E', '2023-06-18', 0),
(10, 'JKL99100', 'Servidor Dell PowerEdge', 'Dell', 'Servidor', 'Mantenimiento', 'Sala de Servidores', '2023-07-10', 0),
(11, 'QWE22334', 'Router Cisco', 'Cisco', 'Red', 'Disponible', 'Sala de Servidores', '2023-08-01', 0),
(12, 'TYU44556', 'Switch HP', 'HP', 'Red', 'Prestado', 'Oficina F', '2023-08-20', 0),
(13, 'IOP66778', 'Proyector BenQ', 'BenQ', 'Proyector', 'Disponible', 'Sala de Conferencias', '2023-09-02', 0),
(14, 'ASD89012', 'Laptop MacBook Pro', 'Apple', 'Computadora', 'Disponible', 'Oficina G', '2023-09-15', 0),
(15, 'ZXC34567', 'Monitor LG', 'LG', 'Monitor', 'Disponible', 'Oficina H', '2023-09-18', 0),
(16, 'VBN56789', 'Escáner Canon', 'Canon', 'Escáner', 'Disponible', 'Oficina A', '2023-09-20', 0),
(17, 'QAZ67890', 'Laptop Lenovo ThinkPad', 'Lenovo', 'Computadora', 'Disponible', 'Oficina I', '2023-09-22', 0),
(18, 'WSX12345', 'Teclado Corsair', 'Corsair', 'Accesorio', 'Disponible', 'Oficina J', '2023-09-25', 0),
(19, 'EDC45678', 'Impresora Canon PIXMA', 'Canon', 'Impresora', 'En Reparación', 'Oficina K', '2023-09-27', 0),
(20, 'RFV78901', 'Servidor HP ProLiant', 'HP', 'Servidor', 'Disponible', 'Sala de Servidores', '2023-09-30', 0),
(21, 'TGB89012', 'Monitor Asus', 'Asus', 'Monitor', 'Disponible', 'Oficina L', '2023-10-02', 0),
(22, 'YHN34567', 'Router TP-Link', 'TP-Link', 'Red', 'Disponible', 'Oficina M', '2023-10-05', 0),
(23, 'UJM56789', 'Switch Cisco', 'Cisco', 'Red', 'Mantenimiento', 'Sala de Servidores', '2023-10-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `historial_acciones`
--

CREATE TABLE `historial_acciones` (
  `ID_Historial` int(11) NOT NULL,
  `ID_Usuario` int(11) DEFAULT NULL,
  `Accion` varchar(255) NOT NULL,
  `Fecha_Accion` varchar(20) NOT NULL,
  `Detalles` varchar(200) DEFAULT NULL,
  `IP_Usuario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `historial_acciones`
--

INSERT INTO `historial_acciones` (`ID_Historial`, `ID_Usuario`, `Accion`, `Fecha_Accion`, `Detalles`, `IP_Usuario`) VALUES
(2, 2, 'Ingreso de equipo', '2024-09-02 11:56:59', 'El usuario admin2 ingresó el equipo Laptop Dell XPS.', '192.168.1.11'),
(3, 2, 'Modificación de usuario', '2024-09-02 11:56:59', 'El usuario admin1 modificó la contraseña de user1.', '192.168.1.12');

-- --------------------------------------------------------

--
-- Table structure for table `historial_equipos`
--

CREATE TABLE `historial_equipos` (
  `ID_Historial_Equipo` int(11) NOT NULL,
  `ID_Equipo` int(11) DEFAULT NULL,
  `ID_Usuario` int(11) DEFAULT NULL,
  `Fecha_Cambio` varchar(20) NOT NULL,
  `Detalles_Cambio` varchar(200) DEFAULT NULL,
  `Comentarios` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE `personas` (
  `ID_Persona` int(11) NOT NULL,
  `Nombre_Completo` varchar(150) NOT NULL,
  `Numero_Documento` varchar(20) NOT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`ID_Persona`, `Nombre_Completo`, `Numero_Documento`, `Telefono`, `Correo`, `Direccion`) VALUES
(1, 'Juan Pérez', '12345678', '555-1234', 'juan.perez@example.com', 'Calle Falsa 123'),
(2, 'María Gómez', '87654321', '555-5678', 'maria.gomez@example.com', 'Avenida Siempre Viva 456'),
(3, 'Carlos López', '11223344', '555-9101', 'carlos.lopez@example.com', 'Boulevard Principal 789');

-- --------------------------------------------------------

--
-- Table structure for table `prestamos`
--

CREATE TABLE `prestamos` (
  `ID_Prestamo` int(11) NOT NULL,
  `ID_Equipo` int(11) DEFAULT NULL,
  `ID_Persona` int(11) DEFAULT NULL,
  `ID_Usuario` int(11) DEFAULT NULL,
  `Fecha_Prestamo` varchar(20) NOT NULL,
  `Fecha_Devolucion` varchar(20) DEFAULT NULL,
  `Estado` varchar(100) DEFAULT NULL,
  `Comentarios` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ID_Rol` int(11) NOT NULL,
  `Nombre_Rol` varchar(20) NOT NULL,
  `Descripcion_Rol` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ID_Rol`, `Nombre_Rol`, `Descripcion_Rol`) VALUES
(1, 'SuperAdmin', 'Super Administrador con todos los permisos'),
(2, 'Encargado', 'Encargado con permisos limitados para la gestión de inventario');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre_Usuario` varchar(100) NOT NULL,
  `Correo_Electronico` varchar(150) NOT NULL,
  `Contrasena` varchar(255) NOT NULL,
  `Fecha_Creacion` varchar(20) DEFAULT NULL,
  `Creado_Por` varchar(50) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `ID_Rol` int(11) DEFAULT NULL,
  `Fecha_Modificacion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Nombre_Usuario`, `Correo_Electronico`, `Contrasena`, `Fecha_Creacion`, `Creado_Por`, `Estado`, `ID_Rol`, `Fecha_Modificacion`) VALUES
(2, 'pepito', 'p@gmail.com', '$2y$10$1iz51l4OCRxETyl9W8UmDex9Kj63bTcnN5vOLyqxpqfeMMsbKTrWK', '13-09-2024 06:03:40', 'fulanito', 'Activo', 1, '13-09-2024 06:03:40'),
(34, 'alejo1', 'alejo1@example.com', '$2y$10$sii7jSMfUK0TJdExXZdnje4koJTpUgIyaxfwa.dNDaMUf4WBlxe6m', '20-09-2024 20:22:36', '1', 'Activo', 1, '20-09-2024 20:22:36'),
(35, 'gustavo', 'gustavo@example.com', '$2y$10$M9Pg85oVNDwh7ipYYZPpMOGysebg6E0UGgz1LqSk5BgBfQGeVflym', '20-09-2024 20:23:12', '1', 'Activo', 1, '20-09-2024 20:23:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`ID_Equipo`);

--
-- Indexes for table `historial_acciones`
--
ALTER TABLE `historial_acciones`
  ADD PRIMARY KEY (`ID_Historial`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indexes for table `historial_equipos`
--
ALTER TABLE `historial_equipos`
  ADD PRIMARY KEY (`ID_Historial_Equipo`),
  ADD KEY `ID_Equipo` (`ID_Equipo`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`ID_Persona`),
  ADD UNIQUE KEY `Numero_Documento` (`Numero_Documento`);

--
-- Indexes for table `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`ID_Prestamo`),
  ADD KEY `ID_Persona` (`ID_Persona`) USING BTREE,
  ADD KEY `ID_Equipo` (`ID_Equipo`) USING BTREE,
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID_Rol`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`),
  ADD UNIQUE KEY `Nombre_Usuario` (`Nombre_Usuario`),
  ADD UNIQUE KEY `Correo_Electronico` (`Correo_Electronico`),
  ADD KEY `ID_Rol` (`ID_Rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `ID_Equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `historial_acciones`
--
ALTER TABLE `historial_acciones`
  MODIFY `ID_Historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `historial_equipos`
--
ALTER TABLE `historial_equipos`
  MODIFY `ID_Historial_Equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
  MODIFY `ID_Persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `ID_Prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ID_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `historial_acciones`
--
ALTER TABLE `historial_acciones`
  ADD CONSTRAINT `historial_acciones_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuarios` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `historial_equipos`
--
ALTER TABLE `historial_equipos`
  ADD CONSTRAINT `historial_equipos_ibfk_1` FOREIGN KEY (`ID_Equipo`) REFERENCES `equipos` (`ID_Equipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historial_equipos_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuarios` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`ID_Equipo`) REFERENCES `equipos` (`ID_Equipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`ID_Persona`) REFERENCES `personas` (`ID_Persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamos_ibfk_3` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuarios` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ID_Rol`) REFERENCES `roles` (`ID_Rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
