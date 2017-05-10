-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 10 Mai 2017 à 16:24
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exercice_3`
--

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id_movies` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `actors` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `producer` varchar(255) NOT NULL,
  `year_of_prod` year(4) NOT NULL,
  `language` varchar(255) NOT NULL,
  `category` enum('horreur','comedie','polar') NOT NULL,
  `storyline` text NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id_movies`, `title`, `actors`, `director`, `producer`, `year_of_prod`, `language`, `category`, `storyline`, `video`) VALUES
(1, 'ghsdfjklhgsdfjkl', 'ghsdklhjkl', 'gshjklghsjk', 'gfklhsdfjkl', 2017, 'Français', 'horreur', 'gfsdhklhjk', 'https://www.w3schools.com/'),
(2, 'gsdfhbgklsdfhjgklsdf', 'hjklfhsdjklghjkl', 'hjkgldfsgjklgdhjkl', 'hjklghsdjkglhj²', 2008, 'Español', 'polar', 'gfsdgdshjgsdbjkgsdf', 'https://www.w3schools.com/'),
(3, 'yutioztyuiooryiu²', 'tyzioyutizeo', 'tyuizyuio', 'ipytzuioeyui', 1978, 'Français', 'polar', 'ghtjksldlhyitoyuirepiztoioteriozyutiozpyiu', 'https://www.w3schools.com/'),
(4, '-(éèç&#039;y45d6fhgfxdbjkdfo', 'ohjigà&#039;hugh_', 'mrlhtuizthumi(up', 'y(iopre_ç)', 2013, 'English', 'comedie', 'èç&quot;&#039;à-yè_gdf456df', 'https://www.w3schools.com/'),
(5, 'Alien', 'Sigourney ', 'Ridley Scott', 'Ridley Scott', 1987, 'Français', 'horreur', 'ghjkdsflhgjksdflhjk', 'https://www.w3schools.com/');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id_movies`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id_movies` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
