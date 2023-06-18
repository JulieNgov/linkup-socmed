-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2023 at 07:00 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linkup`
--

-- --------------------------------------------------------

--
-- Table structure for table `myprofile`
--

CREATE TABLE `myprofile` (
  `id` int NOT NULL,
  `pseudo` text COLLATE utf8mb4_general_ci NOT NULL,
  `bio` text COLLATE utf8mb4_general_ci NOT NULL,
  `file` text COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myprofile`
--

INSERT INTO `myprofile` (`id`, `pseudo`, `bio`, `file`, `user_id`) VALUES
(1, 'Sayu', 'Salut c\'est julie', 'c-est-quoi-une-belle-femme-temoignages.jpeg', NULL),
(2, 'pseudo', 'bio', 'default-pfp.jpg', NULL),
(3, 'pseudo', 'bio', 'default-pfp.jpg', NULL),
(4, 'Cestmoi', 'Write a bio here', 'default-pfp.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE `poster` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `contenu` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poster`
--

INSERT INTO `poster` (`id`, `user_id`, `contenu`, `date`) VALUES
(46, 1, 'jaune', '2023-06-13 12:51:57'),
(47, 4, 'moi moi poste', '2023-06-17 09:57:51'),
(48, 4, 'moi deux', '2023-06-17 10:02:49'),
(49, 1, 'hi', '2023-06-17 10:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int NOT NULL,
  `tag` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(1, 'Art'),
(2, 'Jeux'),
(3, 'Romans'),
(4, 'Manga'),
(5, 'Animaux');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password_hash`) VALUES
(1, 'Julie', 'julie1480@hotmail.fr', '$2y$10$NmmXPXRlIWflZswegpGf.eeR38.Vy5FY3jrjGCAVaOhmNzMvD3lkO'),
(2, 'Sarah', 'hello@heelo.fr', '$2y$10$Smd9pytAz00o..sORMeJXezW4wTm7XHONmEqcP/UoHk1JReztKkgq'),
(3, 'Look', 'dd@dd.fr', '$2y$10$uF7240v7fLrRg1KAcErs0.kmhUyoa62SY0a9Me2Szg2Yc0Y6luP8q'),
(4, 'moi', 'moi@moi.com', '$2y$10$UL8tLupUEKieMvd8DC5BW.3uXbpjQZuK66OHJ9WDfECX3Bmb4OC4q');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `myprofile`
--
ALTER TABLE `myprofile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `myprofile`
--
ALTER TABLE `myprofile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `myprofile`
--
ALTER TABLE `myprofile`
  ADD CONSTRAINT `myprofile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
