-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 26 jan. 2020 à 17:00
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `decathlux`
--

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`idArticle`, `nom`, `description`) VALUES
(1, 'traktor pro 2', 'eazeazeazea'),
(2, 'traktor pro 2', 'dfsdfsddfsdf'),
(3, 'RX', 'kldsjfslkdjfsldkfj'),
(4, 'RX', 'kldsjfslkdjfsldkfj'),
(5, 'qsdqs', 'qsdqs'),
(6, 'sdfqqsdqsd', 'qsdqsdqsd');

--
-- Déchargement des données de la table `rayon`
--

INSERT INTO `rayon` (`idRayon`, `nom`, `idResponsable`) VALUES
(1, 'DJ', 1);

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `mdp`, `nom`, `prenom`, `mail`, `idRayon`, `idRole`) VALUES
(1, 'zeazaeaze', 'Roche', 'Val', 'ushgdfusdh@lfdk.pmolfkg', 1, 1);

--
-- Déchargement des données de la table `vend`
--

INSERT INTO `vend` (`stock`, `prix`, `idArticle`, `idRayon`) VALUES
(32, 1200, 4, 1),
(17, 20, 5, 1),
(12, 240, 6, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
