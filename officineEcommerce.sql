-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 08 Avril 2020 à 10:17
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `officineEcommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `typeCategorie` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `typeCategorie`) VALUES
(1, 'médicament générique'),
(2, 'médicament biosimilaire'),
(3, 'médicament orphelin'),
(4, 'médicament biologique'),
(5, 'médicament à base de plantes'),
(6, 'médicament essentiel');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `idPointDeVente` int(11) NOT NULL,
  `idConsommateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `date`, `heure`, `idPointDeVente`, `idConsommateur`) VALUES
(1, '2019-10-08', '14:00:00', 1, 1),
(2, '2019-10-15', '00:00:00', 2, 10),
(3, '2019-10-10', '00:31:00', 2, 2),
(4, '2019-10-02', '00:00:24', 1, 1),
(5, '2019-10-01', '07:08:27', 2, 2),
(16, '2019-12-09', '11:47:41', 3, 35),
(17, '2019-12-09', '12:00:50', 1, 35),
(18, '2019-12-09', '12:01:40', 1, 35),
(19, '2019-12-09', '12:02:49', 8, 35),
(20, '2019-12-09', '12:10:09', 6, 35),
(21, '2019-12-18', '14:11:00', 7, 35),
(22, '2019-12-20', '07:51:37', 4, 35),
(23, '2019-12-20', '07:54:02', 7, 35);

-- --------------------------------------------------------

--
-- Structure de la table `consommateur`
--

CREATE TABLE `consommateur` (
  `idConsommateur` int(11) NOT NULL,
  `Nom` varchar(150) NOT NULL,
  `Prenom` varchar(150) NOT NULL,
  `AdresseMail` varchar(250) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `consommateur`
--

INSERT INTO `consommateur` (`idConsommateur`, `Nom`, `Prenom`, `AdresseMail`, `password`) VALUES
(35, 'Poirier', 'Théo', 'Poiriertheoo@gmail.com', '$2y$10$EkV9WxVrzQe2Zmyvp5nqs.Fari6dkDKEjQtZxY/0BTOxBdgyBOZ1u'),
(36, 'schwaller', 'nadia', 'chiyu@test.com', '$2y$10$4C96bfQhKuJpxgN7oJhTxufZcNZ/.P1xMsgPdvVaz8QznTEyK7fOW');

-- --------------------------------------------------------

--
-- Structure de la table `fournir`
--

CREATE TABLE `fournir` (
  `idMed` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `quantite` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `fournir`
--

INSERT INTO `fournir` (`idMed`, `idCommande`, `quantite`) VALUES
(1, 1, '5'),
(1, 19, '15'),
(1, 20, '15'),
(1, 22, '5'),
(1, 23, '5'),
(2, 1, '10'),
(2, 19, '10'),
(2, 20, '10');

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE `medicament` (
  `idMed` int(11) NOT NULL,
  `nomMed` varchar(50) NOT NULL,
  `prixMed` varchar(50) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `imageProduit` varchar(500) NOT NULL,
  `descriptionProduit` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `medicament`
--

INSERT INTO `medicament` (`idMed`, `nomMed`, `prixMed`, `idCategorie`, `imageProduit`, `descriptionProduit`) VALUES
(1, 'Amoxicilline', '5.99', 1, 'amoxicilline.jpg', 'L\'amoxicilline est un antibiotique β-lactamine bactéricide de la famille des aminopénicillines indiqué dans le traitement des infections bactériennes à germes sensibles.'),
(2, 'Zolpidem ', '9.99', 1, 'zolpidem.jpg', 'Le zolpidem est un hypnotique de la classe des imidazopyridines. C\'est un somnifère puissant, prescrit uniquement en cas d\'insomnies sévères transitoires. C\'est une molécule apparentée aux benzodiazépines, avec une demi-vie courte et une biodisponibilité très rapide.');

-- --------------------------------------------------------

--
-- Structure de la table `point_de_vente`
--

CREATE TABLE `point_de_vente` (
  `idPointDeVente` int(11) NOT NULL,
  `codePostal` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `numeroTelephone` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `point_de_vente`
--

INSERT INTO `point_de_vente` (`idPointDeVente`, `codePostal`, `ville`, `numeroTelephone`, `nom`, `adresse`) VALUES
(1, '55000', 'Bar-le-duc', '03 29 76 20 56', 'Pharmacie de la Rochelle', '10 Boulevard de la Rochelle'),
(2, '55000', 'Bar-le-duc', '03 29 79 11 74', 'Pharmacie de la Gare', '22 Rue du Général de Gaulle'),
(3, '62100', 'Caen', '03 21 36 27 63', 'Pharmacie des fontinettes', '1 Square des fontinettes'),
(4, '76000', 'Rouen', '02 35 63 58 20', 'Pharmacie Lafayette', '91 rue du general leclerc'),
(5, '75010', 'Paris', '01 46 07 55 00', 'Pharmacie Gare de L\'Est', '4 rue du 8 mai 1945'),
(6, '10000', 'Troyes', '03 25 73 10 80', 'Pharmacie Brossolette', '92 avenue Pierre Brossolette'),
(7, '35000', 'Rennes', '02 99 30 12 19', 'Pharmacie de Rennes', '2 Place de Bretagne'),
(8, '49100', 'Angers', '02 41 87 42 21', 'Pharmacie Foch Maison Bleue', '10 Boulevard du Maréchal Foch'),
(9, '21000', 'Dijon', '03 80 30 37 30', 'Pharmacie Bossuet', '3 Place Bossuet'),
(10, '86000', 'Poitiers', '05 49 41 02 10 ', 'Pharmacie des Cordeliers Anton&Willem', '24 Rue Gambetta'),
(11, '62001', 'Lyon', '04 78 37 10 03', 'Pharmacie Charlemagne', '11 Cours Charlemagne'),
(12, '87100', 'Limoges', '05 55 77 26 86', 'Pharmacie Roubineau Paul', '5 Rue Aristide Briand'),
(13, '33000', 'Bordeaux', '05 56 90 94 04', 'Pharmacie de la Bourse ', '3 Quai Richelieu'),
(14, '31000', 'Toulouse', '05 61 52 67 50', 'Pharmacie Esquirol', '28 Rue de Metz'),
(15, '34070', 'Montpellier', '04 67 92 61 35', 'Pharmacie des grisettes', '100 Rambla des Calissons');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `commande_point_de_vente_FK` (`idPointDeVente`),
  ADD KEY `commande_consommateur0_FK` (`idConsommateur`);

--
-- Index pour la table `consommateur`
--
ALTER TABLE `consommateur`
  ADD PRIMARY KEY (`idConsommateur`);

--
-- Index pour la table `fournir`
--
ALTER TABLE `fournir`
  ADD PRIMARY KEY (`idMed`,`idCommande`),
  ADD KEY `fournir_commande0_FK` (`idCommande`);

--
-- Index pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`idMed`),
  ADD KEY `medicament_categorie_FK` (`idCategorie`);

--
-- Index pour la table `point_de_vente`
--
ALTER TABLE `point_de_vente`
  ADD PRIMARY KEY (`idPointDeVente`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `consommateur`
--
ALTER TABLE `consommateur`
  MODIFY `idConsommateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_point_de_vente_FK` FOREIGN KEY (`idPointDeVente`) REFERENCES `point_de_vente` (`idPointDeVente`);

--
-- Contraintes pour la table `fournir`
--
ALTER TABLE `fournir`
  ADD CONSTRAINT `fournir_commande0_FK` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`),
  ADD CONSTRAINT `fournir_medicament_FK` FOREIGN KEY (`idMed`) REFERENCES `medicament` (`idMed`);

--
-- Contraintes pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD CONSTRAINT `medicament_categorie_FK` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
