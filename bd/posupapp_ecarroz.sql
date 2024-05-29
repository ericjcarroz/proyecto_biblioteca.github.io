-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 11, 2024 at 04:13 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posupapp_ecarroz`
--

-- --------------------------------------------------------

--
-- Table structure for table `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `contenido` text,
  `autor` varchar(100) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titulo`, `contenido`, `autor`, `fecha_publicacion`) VALUES
(1, 'Cien años de soledad', 'Cien años de soledad es una novela del escritor colombiano Gabriel García Márquez, ganador del Premio Nobel de Literatura en 1982. Es considerada una obra maestra de la literatura hispanoamericana y universal.', 'Gabriel García Márquez', '1967-05-30'),
(2, 'El amor en los tiempos del cólera', 'El amor en los tiempos del cólera es una novela del escritor colombiano Gabriel García Márquez, publicada en 1985. La obra narra una historia de amor no correspondido que perdura a lo largo del tiempo.', 'Gabriel García Márquez', '1985-11-05'),
(3, 'Rayuela', 'Rayuela es una novela del escritor argentino Julio Cortázar, publicada en 1963. Es una de las obras más importantes del boom latinoamericano y está considerada una novela experimental.', 'Julio Cortázar', '1963-06-28'),
(4, 'Ficciones', 'Ficciones es un libro de cuentos del escritor argentino Jorge Luis Borges, publicado en 1944. Es una de las obras más influyentes de la literatura universal y está compuesto por cuentos de carácter fantástico y metafísico.', 'Jorge Luis Borges', '1944-06-01'),
(5, 'El Aleph', 'El Aleph es un libro de cuentos del escritor argentino Jorge Luis Borges, publicado en 1949. Contiene cuentos que exploran temas como la metafísica, la memoria y la realidad.', 'Jorge Luis Borges', '1949-05-01'),
(6, 'La ciudad y los perros', 'La ciudad y los perros es una novela del escritor peruano Mario Vargas Llosa, publicada en 1962. Es una de las obras más importantes de la literatura latinoamericana contemporánea y aborda temas como la corrupción y la violencia en la sociedad peruana.', 'Mario Vargas Llosa', '1962-10-01'),
(7, 'La casa de los espíritus', 'La casa de los espíritus es una novela de la escritora chilena Isabel Allende, publicada en 1982. Es una saga familiar que abarca varias generaciones y está ambientada en Chile.', 'Isabel Allende', '1982-06-01'),
(8, 'Don Quijote de la Mancha', 'Don Quijote de la Mancha es una novela del escritor español Miguel de Cervantes, publicada en 1605. Es considerada una de las obras más importantes de la literatura universal y una de las primeras novelas modernas.', 'Miguel de Cervantes', '1605-01-16'),
(9, 'Crimen y castigo', 'Crimen y castigo es una novela del escritor ruso Fiódor Dostoyevski, publicada en 1866. Es una de las obras más influyentes de la literatura rusa y explora temas como la moralidad, el castigo y la redención.', 'Fiódor Dostoyevski', '1866-01-01'),
(10, 'El retrato de Dorian Gray', 'El retrato de Dorian Gray es una novela del escritor irlandés Oscar Wilde, publicada en 1890. Es una obra de literatura gótica que explora temas como la belleza, la vanidad y la decadencia moral.', 'Oscar Wilde', '1890-07-01'),
(11, 'Orgullo y prejuicio', 'Orgullo y prejuicio es una novela de la escritora británica Jane Austen, publicada en 1813. Es una de las obras más conocidas de la literatura inglesa y narra la historia de amor entre Elizabeth Bennet y el Sr. Darcy.', 'Jane Austen', '1813-01-28'),
(12, '1984', '1984 es una novela del escritor británico George Orwell, publicada en 1949. Es una obra distópica que describe una sociedad totalitaria y vigilada por el gobierno, donde se manipula la verdad y se suprime la libertad individual.', 'George Orwell', '1949-06-08'),
(13, 'Matar un ruiseñor', 'Matar un ruiseñor es una novela de la escritora estadounidense Harper Lee, publicada en 1960. Ganó el Premio Pulitzer en 1961 y es una de las obras más importantes de la literatura estadounidense contemporánea.', 'Harper Lee', '1960-07-11'),
(14, 'El señor de los anillos', 'El señor de los anillos es una trilogía de novelas del escritor británico J.R.R. Tolkien, publicada entre 1954 y 1955. Es una de las obras más famosas de la literatura fantástica y ha sido adaptada a numerosas películas y series de televisión.', 'J.R.R. Tolkien', '1954-07-29'),
(15, 'Las aventuras de Tom Sawyer', 'Las aventuras de Tom Sawyer es una novela del escritor estadounidense Mark Twain, publicada en 1876. Es una de las obras más conocidas de la literatura estadounidense y narra las aventuras del niño Tom Sawyer en el pueblo ficticio de San Petersburgo, Missouri.', 'Mark Twain', '1876-12-10'),
(16, 'Frankenstein', 'Frankenstein, o el moderno Prometeo es una novela de la escritora británica Mary Shelley, publicada en 1818. Es una obra de literatura gótica y ciencia ficción que ha sido adaptada a numerosas películas y obras teatrales.', 'Mary Shelley', '1818-01-01'),
(17, 'Drácula', 'Drácula es una novela del escritor irlandés Bram Stoker, publicada en 1897. Es una de las obras más famosas de la literatura de terror y ha inspirado numerosas películas, series de televisión y obras literarias.', 'Bram Stoker', '1897-05-26'),
(18, 'Las uvas de la ira', 'Las uvas de la ira es una novela del escritor estadounidense John Steinbeck, publicada en 1939. Ganó el Premio Pulitzer en 1940 y es una de las obras más importantes de la literatura estadounidense del siglo XX.', 'John Steinbeck', '1939-04-14'),
(19, 'La Isla de Robinson', 'Libro', 'Simon Rodriguez', '2024-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`) VALUES
(1, 'eric', 'ericjosecm@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
