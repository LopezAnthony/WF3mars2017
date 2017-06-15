-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 13 Juin 2017 à 17:34
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exo1_userslist`
--

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Science-Fiction'),
(2, 'Aventure'),
(3, 'Action');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('eleve','formateur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`id`, `nom`, `prenom`, `email`, `password`, `type`) VALUES
(4, 'Lopez', 'Anthony', 'test@test.test', 'd41d8cd98f00b204e9800998ecf8427e', 'eleve'),
(5, 'Lopez', 'Anthony', 'anthony.lopez@mail.fr', '19c4a0194eb84e33f42bc1107215771d', 'eleve'),
(6, 'Lopez', 'Anthony', 'andreimonk@gmail.com', 'c7143eba8f07662073d529a4d429c994', 'eleve');

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nb_viewers` int(11) NOT NULL DEFAULT '0',
  `release_date` date NOT NULL,
  `id_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id`, `title`, `nb_viewers`, `release_date`, `id_genre`) VALUES
(1, 'Interstellar', 12, '2014-11-05', 1),
(2, 'Inception', 13, '2010-07-21', 1),
(3, 'Star Wars : Episode V - L\'empire contre-attaque', 34, '1980-08-20', 1),
(4, 'Star Wars : Episode VI - Le Retour du Jedi', 27, '1983-10-19', 1),
(5, 'Star Wars : Episode IV - Un nouvel espoir (La Guerre des étoiles)', 36, '1977-10-19', 1),
(6, 'Retour vers le futur', 31, '1985-10-30', 1),
(7, 'Matrix', 25, '1999-06-23', 1),
(8, 'Alien, le huitième passager', 26, '1979-09-12', 1),
(9, 'Le Seigneur des anneaux : le retour du roi', 12, '2003-12-17', 2),
(10, 'Le Seigneur des anneaux : la communauté de l\'anneau', 14, '2001-12-19', 2),
(11, 'Le Seigneur des anneaux : les deux tours', 15, '2002-12-18', 2),
(12, 'Indiana Jones et la Dernière Croisade', 23, '1989-09-16', 2),
(13, 'Les Aventuriers de l\'Arche perdue', 11, '1981-09-16', 2),
(14, 'The Dark Knight, Le Chevalier Noir', 13, '2008-08-13', 3),
(15, 'Warrior', 6, '2011-09-14', 3),
(16, 'X-Men: Days of Future Past', 14, '2014-05-21', 3),
(17, 'Combats de maître', 8, '2000-10-20', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `gender` enum('Mlle','Mme','M') NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `gender`, `firstname`, `lastname`, `email`, `birthdate`, `city`) VALUES
(1, 'Mlle', 'Agnès', 'Richard', 'a.richard@hotmail.fr', '1982-04-13', 'Moulin-la-Forêt'),
(2, 'Mlle', 'Nathalie', 'Clement', 'nath.clement@free.fr', '1984-02-11', 'Nanterre'),
(3, 'M', 'Yves', 'Duval', 'yvesduval@yahoo.fr', '1978-06-21', 'RoussetBourg'),
(4, 'Mme', 'Marguerite', 'Raynaud', 'marguerite.ray@orange.fr', '1954-10-17', 'Vidal'),
(5, 'Mme', 'Gabrielle', 'Pascal', 'gabiepascal320@wanadoo.fr', '1973-02-23', 'Saint-Pierre'),
(6, 'M', 'Benjamin', 'Carre', 'carre_benj@voila.fr', '1977-03-30', 'Bordeaux'),
(7, 'Mme', 'Catherine', 'Leduc', 'leduc.cathie@gmail.com', '1977-09-16', 'Costa'),
(8, 'M', 'Noël', 'Cordier', 'cordier226@free.fr', '1958-01-30', 'Rolland-sur-Mer'),
(9, 'M', 'Raymond', 'Chovait', 'raym.chauvait756@wanadoo.fr', '1973-08-01', 'St-Nazaire'),
(10, 'M', 'Thomas', 'Dias', 'tomtom.d@live.fr', '1989-08-07', 'Besnardville'),
(11, 'Mme', 'Olivia', 'Bouvet', 'olbouv27@orange.fr', '1983-08-14', 'Le Mans'),
(12, 'M', 'Tristan', 'Andre', 'tristan267@noos.fr', '1994-06-16', 'Limoges'),
(13, 'Mme', 'Bernadette', 'Maillet', 'maillet.bernadette@orange.fr', '1936-10-27', 'Gerstheim'),
(14, 'M', 'Maurice', 'Rochet', 'marochet@hotmail.fr', '1957-10-29', 'Marchandnec'),
(15, 'M', 'Édouard', 'Pereira', 'ed.pereira@gmail.com', '1964-10-01', 'Vendome'),
(16, 'Mlle', 'Anthony', 'Lopez', 'anthony.lopez@mail.fr', '1991-01-12', 'Paris');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
