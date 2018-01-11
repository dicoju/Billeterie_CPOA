-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Jeu 11 Janvier 2018 à 22:01
-- Version du serveur :  5.6.34
-- Version de PHP :  7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `billeterie_cpoa`
--

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE `billet` (
  `numBillet` int(11) NOT NULL,
  `prixBilletInitial` int(11) NOT NULL,
  `codePromo` varchar(255) NOT NULL,
  `dateBillet` date NOT NULL,
  `numUser` int(11) NOT NULL,
  `numEmplacement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categoriePlace`
--

CREATE TABLE `categoriePlace` (
  `numEmplacement` int(11) NOT NULL,
  `nomEmplacement` varchar(255) NOT NULL,
  `variationPrixEmplacement` int(11) NOT NULL,
  `nbPlaces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categoriePlace`
--

INSERT INTO `categoriePlace` (`numEmplacement`, `nomEmplacement`, `variationPrixEmplacement`, `nbPlaces`) VALUES
(1, 'Catégorie 1', 0, 0),
(2, 'Catégorie 2', 30, 0),
(3, 'Catégorie 3', 60, 0);

-- --------------------------------------------------------

--
-- Structure de la table `codePromo`
--

CREATE TABLE `codePromo` (
  `valeurCode` varchar(255) NOT NULL,
  `variationPrix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `codePromo`
--

INSERT INTO `codePromo` (`valeurCode`, `variationPrix`) VALUES
('licencie30', 30),
('promo10', 10),
('promo15', 15),
('promo20', 20),
('solidarite25', 45);

-- --------------------------------------------------------

--
-- Structure de la table `court`
--

CREATE TABLE `court` (
  `numCourt` int(11) NOT NULL,
  `nomCourt` varchar(255) NOT NULL,
  `nbPlaces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `numUser` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`numBillet`);

--
-- Index pour la table `categoriePlace`
--
ALTER TABLE `categoriePlace`
  ADD PRIMARY KEY (`numEmplacement`);

--
-- Index pour la table `codePromo`
--
ALTER TABLE `codePromo`
  ADD PRIMARY KEY (`valeurCode`);

--
-- Index pour la table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`numCourt`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`numUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `billet`
--
ALTER TABLE `billet`
  MODIFY `numBillet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categoriePlace`
--
ALTER TABLE `categoriePlace`
  MODIFY `numEmplacement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `court`
--
ALTER TABLE `court`
  MODIFY `numCourt` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `numUser` int(11) NOT NULL AUTO_INCREMENT;