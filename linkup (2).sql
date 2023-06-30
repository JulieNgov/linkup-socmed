-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2023 at 10:44 AM
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
(1, 'Julieee', 'this is my bio', 'call.gif', NULL),
(2, 'pseudo', 'bio', 'default-pfp.jpg', NULL),
(3, 'pseudo', 'bio', 'default-pfp.jpg', NULL),
(4, 'Cestmoi', 'Write a bio here', 'default-pfp.jpg', NULL),
(5, 'pseudo', 'Write a bio here', 'default-pfp.jpg', NULL),
(6, 'pseudo', 'Write a bio here', 'default-pfp.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE `poster` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `contenu` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `image` text COLLATE utf8mb4_general_ci NOT NULL,
  `tag` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poster`
--

INSERT INTO `poster` (`id`, `user_id`, `contenu`, `image`, `tag`, `date`) VALUES
(47, 4, 'moi moi poste', '', '', '2023-06-17 09:57:51'),
(48, 4, 'moi deux', '', '', '2023-06-17 10:02:49'),
(49, 1, 'hi', '', '', '2023-06-17 10:50:35'),
(50, 1, 'hello', '', 'Romans', '2023-06-20 08:35:00'),
(51, 1, 'wow ce jeu', '', 'Jeux', '2023-06-22 16:33:54'),
(52, 1, 'hello', 'IMG_5302.jpg', 'Animaux', '2023-06-29 15:00:56'),
(53, 1, 'manga', '', 'Manga', '2023-06-29 15:03:53'),
(56, 1, 'hi', 'IMG_5300.jpg', 'Art', '2023-06-29 15:20:30'),
(57, 1, 'hello', 'IMG_5300.jpg', 'Jeux', '2023-06-29 15:31:13'),
(58, 1, 'Ceci est un poste', 'IMG_5300.jpg', 'Jeux', '2023-06-29 15:31:39'),
(59, 1, 'hello', 'IMG_5300.jpg', 'Jeux', '2023-06-29 15:33:56'),
(60, 1, 'Ceci est un poste', 'IMG_5300.jpg', 'Romans', '2023-06-29 15:42:18'),
(62, 1, 'childe', 'Fh2cTWcakAARWSl.jpg', 'Art', '2023-06-29 15:43:30'),
(63, 1, 'un poste', '', 'Manga', '2023-06-29 15:44:10'),
(68, 1, 'Ceci est un poste', '', 'Livres', '2023-06-30 10:12:24'),
(69, 1, 'hi', '3dJ.gif', 'Animaux', '2023-06-30 10:12:36');

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
(5, 'Animaux'),
(6, 'Plantes'),
(7, 'Livres');

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
(4, 'moi', 'moi@moi.com', '$2y$10$UL8tLupUEKieMvd8DC5BW.3uXbpjQZuK66OHJ9WDfECX3Bmb4OC4q'),
(5, 'Haiito', 'hannaantoine2002@gmail.com', '$2y$10$DRAjvaZexJ7cHiS2tBicVe2r.2j4WjbKQn7nAbSY4pJOwQF2DpUYW'),
(6, 'Uncompte', 'dd', '$2y$10$KULGLVigqM7Pavlk7fTEJ.YLDd993jKv67lVU//9JJGOnZPhC6u1u');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
