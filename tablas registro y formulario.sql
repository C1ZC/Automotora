-- Base de datos: `automotora`
--C1ZC--
--https://github.com/C1ZC
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
-- Estructura de tabla para la tabla `autos`
--
CREATE DATABASE automotora;

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuarios` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(70) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Password` varchar(60) NOT NULL,
  PRIMARY KEY (`idusuarios`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

CREATE TABLE IF NOT EXISTS `autos` (
  `idautos` int(11) NOT NULL ,
  `Matricula` varchar(10) NOT NULL,
  `Serial_motor` varchar(20) NOT NULL,
  `Serial_carroceria` varchar(30) NOT NULL,
  `Marca` varchar(20) NOT NULL,
  `Modelo` varchar(20) NOT NULL,
  `Anio` int(20) NOT NULL,
  `Color` varchar(15),
  `Precio` decimal(14,2) NOT NULL,
   UNIQUE (`idautos`)); 

INSERT INTO autos (idautos, Matricula, Serial_motor, Serial_carroceria, Marca, Modelo, Anio, Color, Precio)
VALUES 
(1, 'MAT123', 'SM123', 'SC123', 'Toyota', 'Corolla', 2020, 'Rojo', 200000),
(2, 'MAT124', 'SM124', 'SC124', 'Honda', 'Civic', 2019, 'Azul', 1900000),
(3, 'MAT125', 'SM125', 'SC125', 'Ford', 'Mustang', 2021, 'Negro', 3000000),
(4, 'MAT126', 'SM126', 'SC126', 'Chevrolet', 'Camaro', 2021, 'Blanco', 3500000),
(5, 'MAT127', 'SM127', 'SC127', 'Nissan', 'Sentra', 2018, 'Gris', 1800000),
(6, 'MAT128', 'SM128', 'SC128', 'Hyundai', 'Elantra', 2020, 'Verde', 2100000),
(7, 'MAT129', 'SM129', 'SC129', 'Kia', 'Optima', 2020, 'Azul', 2200000),
(8, 'MAT130', 'SM130', 'SC130', 'BMW', 'Serie 3', 2021, 'Negro', 4000000),
(9, 'MAT131', 'SM131', 'SC131', 'Audi', 'A4', 2021, 'Blanco', 4200000),
(10, 'MAT132', 'SM132', 'SC132', 'Mercedes-Benz', 'Clase C', 2021, 'Rojo', 4500000);
