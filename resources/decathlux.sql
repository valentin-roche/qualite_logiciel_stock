-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 01 fév. 2020 à 15:00
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  decathlux
--
CREATE DATABASE IF NOT EXISTS decathlux DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE decathlux;

-- --------------------------------------------------------

--
-- Structure de la table articles
--

DROP TABLE IF EXISTS articles;
CREATE TABLE articles (
  idArticle int(11) NOT NULL,
  nom varchar(40) COLLATE utf8_bin NOT NULL,
  description text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table articles
--

INSERT INTO articles (idArticle, nom, description) VALUES
(5, 'Canne à peche', 'une super canne pour les poissons'),
(6, 'Derailleur Shimano', 'un derailleur performant pour le tout terrain'),
(7, 'Masque', 'Permet de voir sous l\'eau'),
(8, 'Arc composite', 'comme dans tout les jeux vidéos');

-- --------------------------------------------------------

--
-- Structure de la table rayon
--

DROP TABLE IF EXISTS rayon;
CREATE TABLE rayon (
  idRayon int(11) NOT NULL,
  nom varchar(40) COLLATE utf8_bin NOT NULL,
  idResponsable int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table rayon
--

INSERT INTO rayon (idRayon, nom, idResponsable) VALUES
(2, 'Cyclisme', 1),
(3, 'Pêche', 1),
(4, 'Tir à l\'arc', 1),
(5, 'Plongée', 1);

-- --------------------------------------------------------

--
-- Structure de la table role
--

DROP TABLE IF EXISTS role;
CREATE TABLE role (
  idRole int(11) NOT NULL,
  libelle varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table role
--

INSERT INTO role (idRole, libelle) VALUES
(1, 'vendeur'),
(2, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table utilisateur
--

DROP TABLE IF EXISTS utilisateur;
CREATE TABLE utilisateur (
  idUtilisateur int(11) NOT NULL,
  mdp varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  nom varchar(40) NOT NULL,
  prenom varchar(40) NOT NULL,
  mail varchar(60) NOT NULL,
  idRole int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table utilisateur
--

INSERT INTO utilisateur (idUtilisateur, mdp, nom, prenom, mail, idRole) VALUES
(5, 'WlVYOEtrMHNJYU1VaENBbjZXWFZRUT09', 'Test', 'Manager', 'test.manager@test.com', 2),
(6, 'TWU5VjJta2hlVXRzZVRtekJBYWt4dz09', 'Test', 'Vendeur', 'test.vendeur@test.com', 1),
(4, 'QisyZDJxSVJ0aXlrc3AzZzl3cDVodz09', 'Roche', 'Valentin', 'valent1.roche@orange.fr', 2);

-- --------------------------------------------------------

--
-- Structure de la table vend
--

DROP TABLE IF EXISTS vend;
CREATE TABLE vend (
  stock int(11) NOT NULL,
  prix int(11) NOT NULL,
  idArticle int(11) NOT NULL,
  idRayon int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table vend
--

INSERT INTO vend (stock, prix, idArticle, idRayon) VALUES
(200, 200, 5, 3),
(5, 300, 6, 2),
(20, 10, 7, 5),
(2, 500, 8, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table articles
--
ALTER TABLE articles
  ADD PRIMARY KEY (idArticle);

--
-- Index pour la table rayon
--
ALTER TABLE rayon
  ADD PRIMARY KEY (idRayon),
  ADD KEY idResponsable (idResponsable);

--
-- Index pour la table role
--
ALTER TABLE role
  ADD PRIMARY KEY (idRole);

--
-- Index pour la table utilisateur
--
ALTER TABLE utilisateur
  ADD PRIMARY KEY (idUtilisateur),
  ADD KEY idRole (idRole);

--
-- Index pour la table vend
--
ALTER TABLE vend
  ADD PRIMARY KEY (idRayon,idArticle),
  ADD KEY idArticle (idArticle);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table articles
--
ALTER TABLE articles
  MODIFY idArticle int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table rayon
--
ALTER TABLE rayon
  MODIFY idRayon int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table role
--
ALTER TABLE role
  MODIFY idRole int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table utilisateur
--
ALTER TABLE utilisateur
  MODIFY idUtilisateur int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
