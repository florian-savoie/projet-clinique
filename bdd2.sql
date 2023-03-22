-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 22 mars 2023 à 14:17
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `clinique`
--

-- --------------------------------------------------------

--
-- Structure de la table `actes_medicaux`
--

DROP TABLE IF EXISTS `actes_medicaux`;
CREATE TABLE IF NOT EXISTS `actes_medicaux` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `actes_medicaux`
--

INSERT INTO `actes_medicaux` (`id`, `nom`, `prix`) VALUES
(1, 'Consultation', '50.00'),
(2, 'Radiographie', '100.00'),
(3, 'Scanner', '200.00'),
(4, 'IRM', '300.00'),
(5, 'Chirurgie', '500.00');

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

DROP TABLE IF EXISTS `agents`;
CREATE TABLE IF NOT EXISTS `agents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_agent` int DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_agent` (`id_agent`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `agents`
--

INSERT INTO `agents` (`id`, `id_agent`, `nom`, `prenom`) VALUES
(1, 17, 'Agent1Nom', 'Agent1Prenom'),
(2, 18, 'Agent2Nom', 'Agent2Prenom'),
(3, 19, 'Agent3Nom', 'Agent3Prenom'),
(4, 20, 'Agent4Nom', 'Agent4Prenom'),
(5, 21, 'Agent5Nom', 'Agent5Prenom'),
(6, 22, 'Agent6Nom', 'Agent6Prenom'),
(7, 23, 'Agent7Nom', 'Agent7Prenom'),
(8, 24, 'Agent8Nom', 'Agent8Prenom'),
(9, 25, 'Agent9Nom', 'Agent9Prenom'),
(10, 26, 'Agent10Nom', 'Agent10Prenom');

-- --------------------------------------------------------

--
-- Structure de la table `consignes`
--

DROP TABLE IF EXISTS `consignes`;
CREATE TABLE IF NOT EXISTS `consignes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `acte_id` int NOT NULL,
  `consigne` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `acte_id` (`acte_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `consignes`
--

INSERT INTO `consignes` (`id`, `acte_id`, `consigne`) VALUES
(1, 1, 'Prévoir une attente de 15 minutes'),
(2, 2, 'Venir à jeun'),
(3, 3, 'Ne pas avoir de bijoux ou d\'objets métalliques sur soi');

-- --------------------------------------------------------

--
-- Structure de la table `creneaux_bloques`
--

DROP TABLE IF EXISTS `creneaux_bloques`;
CREATE TABLE IF NOT EXISTS `creneaux_bloques` (
  `id` int NOT NULL AUTO_INCREMENT,
  `medecin_id` int NOT NULL,
  `date_heure_debut` datetime NOT NULL,
  `date_heure_fin` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `medecin_id` (`medecin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `creneaux_bloques`
--

INSERT INTO `creneaux_bloques` (`id`, `medecin_id`, `date_heure_debut`, `date_heure_fin`) VALUES
(1, 1, '2023-03-23 09:00:00', '2023-03-23 12:00:00'),
(2, 1, '2023-03-24 09:00:00', '2023-03-24 12:00:00'),
(3, 1, '2023-03-25 09:00:00', '2023-03-25 12:00:00'),
(4, 2, '2023-03-23 14:00:00', '2023-03-23 17:00:00'),
(5, 2, '2023-03-24 14:00:00', '2023-03-24 17:00:00'),
(6, 2, '2023-03-25 14:00:00', '2023-03-25 17:00:00'),
(7, 3, '2023-03-23 09:00:00', '2023-03-23 12:00:00'),
(8, 3, '2023-03-24 09:00:00', '2023-03-24 12:00:00'),
(9, 3, '2023-03-25 09:00:00', '2023-03-25 12:00:00'),
(10, 4, '2023-03-23 14:00:00', '2023-03-23 17:00:00'),
(11, 4, '2023-03-24 14:00:00', '2023-03-24 17:00:00'),
(12, 4, '2023-03-25 14:00:00', '2023-03-25 17:00:00'),
(13, 5, '2023-03-23 09:00:00', '2023-03-23 12:00:00'),
(14, 5, '2023-03-24 09:00:00', '2023-03-24 12:00:00'),
(15, 5, '2023-03-25 09:00:00', '2023-03-25 12:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `depots`
--

DROP TABLE IF EXISTS `depots`;
CREATE TABLE IF NOT EXISTS `depots` (
  `id` int NOT NULL AUTO_INCREMENT,
  `patient_id` int NOT NULL,
  `date_heure` datetime NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `directeur`
--

DROP TABLE IF EXISTS `directeur`;
CREATE TABLE IF NOT EXISTS `directeur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_directeur` int DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_directeur` (`id_directeur`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `directeur`
--

INSERT INTO `directeur` (`id`, `id_directeur`, `nom`, `prenom`) VALUES
(1, 1, 'Dupont', 'Marc'),
(2, 2, 'Martin', 'Sophie'),
(3, 3, 'Girard', 'Jean');

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

DROP TABLE IF EXISTS `employes`;
CREATE TABLE IF NOT EXISTS `employes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('agents','medecins','directeur','patients') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id`, `username`, `password`, `role`) VALUES
(1, 'florian', 'test', 'directeur'),
(2, 'directeur2', 'motdepasse2', 'directeur'),
(3, 'directeur3', 'motdepasse3', 'directeur'),
(4, 'docteur1', 'motdepasse4', ''),
(5, 'docteur2', 'motdepasse5', ''),
(6, 'docteur3', 'motdepasse6', ''),
(7, 'docteur4', 'motdepasse7', 'medecins'),
(8, 'docteur5', 'motdepasse8', ''),
(9, 'docteur6', 'motdepasse9', ''),
(10, 'docteur7', 'motdepasse10', ''),
(11, 'docteur8', 'motdepasse11', ''),
(12, 'docteur9', 'motdepasse12', ''),
(13, 'docteur10', 'motdepasse13', ''),
(14, 'docteur11', 'motdepasse14', ''),
(15, 'docteur12', 'motdepasse15', ''),
(16, 'agent1', 'motdepasse16', ''),
(17, 'agent2', 'motdepasse17', ''),
(18, 'agent3', 'motdepasse18', 'agents'),
(19, 'agent4', 'motdepasse19', 'agents'),
(20, 'agent5', 'motdepasse20', ''),
(21, 'agent6', 'motdepasse21', ''),
(22, 'agent7', 'motdepasse22', ''),
(23, 'agent8', 'motdepasse23', ''),
(24, 'agent9', 'motdepasse24', ''),
(25, 'agent10', 'motdepasse25', ''),
(26, 'patient1', 'motdepasse26', 'patients'),
(27, 'patient2', 'motdepasse27', ''),
(28, 'patient3', 'motdepasse28', ''),
(29, 'patient4', 'motdepasse29', ''),
(30, 'patient5', 'motdepasse30', ''),
(31, 'patient6', 'motdepasse31', ''),
(32, 'patient7', 'motdepasse32', ''),
(33, 'patient8', 'motdepasse33', ''),
(34, 'patient9', 'motdepasse34', ''),
(35, 'patient10', 'motdepasse35', '');

-- --------------------------------------------------------

--
-- Structure de la table `encaissements`
--

DROP TABLE IF EXISTS `encaissements`;
CREATE TABLE IF NOT EXISTS `encaissements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `patient_id` int NOT NULL,
  `date_heure` datetime NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `medecins`
--

DROP TABLE IF EXISTS `medecins`;
CREATE TABLE IF NOT EXISTS `medecins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_medecin` int DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `specialite` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_medecin` (`id_medecin`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `medecins`
--

INSERT INTO `medecins` (`id`, `id_medecin`, `nom`, `prenom`, `specialite`) VALUES
(1, 4, 'Docteur1Nom', 'Docteur1Prenom', 'Cardiologue'),
(2, 5, 'Docteur2Nom', 'Docteur2Prenom', 'Gastro-entérologue'),
(3, 6, 'Docteur3Nom', 'Docteur3Prenom', 'Neurologue'),
(4, 7, 'Docteur4Nom', 'Docteur4Prenom', 'Ophtalmologue'),
(5, 8, 'Docteur5Nom', 'Docteur5Prenom', 'Pédiatre'),
(6, 9, 'Docteur6Nom', 'Docteur6Prenom', 'Psychiatre'),
(7, 10, 'Docteur7Nom', 'Docteur7Prenom', 'Radiologue'),
(8, 11, 'Docteur8Nom', 'Docteur8Prenom', 'Rhumatologue'),
(9, 12, 'Docteur9Nom', 'Docteur9Prenom', 'Chirurgien'),
(10, 13, 'Docteur10Nom', 'Docteur10Prenom', 'Dermatologue'),
(11, 14, 'Docteur11Nom', 'Docteur11Prenom', 'Endocrinologue'),
(12, 15, 'Docteur12Nom', 'Docteur12Prenom', 'Gynécologue');

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_patient` int DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nss` varchar(15) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `profession` varchar(50) DEFAULT NULL,
  `situation_familiale` enum('marie','celibataire','divorce','veuf') DEFAULT NULL,
  `solde` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_patient` (`id_patient`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`id`, `id_patient`, `nom`, `prenom`, `nss`, `adresse`, `tel`, `email`, `profession`, `situation_familiale`, `solde`) VALUES
(1, 26, 'Durand', 'Sophie', '2234567890123', '3 rue de la Gare, Paris', '0123456789', 'sophie.durand@gmail.com', 'Infirmière', 'celibataire', '1000.00'),
(2, 27, 'Lefevre', 'Jean', '1234567890123', '8 rue de la Paix, Lyon', '0678901234', 'jean.lefevre@hotmail.com', 'Ingénieur', 'marie', '500.00'),
(3, 28, 'Morel', 'Marie', '2234567890123', '14 rue des Lilas, Lille', '0456789012', 'marie.morel@yahoo.fr', 'Etudiante', 'celibataire', '150.00'),
(4, 29, 'Dupont', 'Pierre', '1234567890123', '23 avenue des Champs-Élysées, Paris', '0789012345', 'pierre.dupont@gmail.com', 'Comptable', 'marie', '250.00'),
(5, 30, 'Garcia', 'Laura', '2234567890123', '5 avenue de la Liberté, Toulouse', '0234567890', 'laura.garcia@hotmail.com', 'Infirmière', 'celibataire', '100.00'),
(6, 31, 'Martin', 'David', '2234567890123', '12 rue des Roses, Nice', '0567890123', 'david.martin@yahoo.fr', 'Informaticien', 'celibataire', '0.00'),
(7, 32, 'Leroy', 'Céline', '1234567890123', '17 avenue du Général de Gaulle, Marseille', '0789123456', 'celine.leroy@gmail.com', 'Enseignante', 'marie', '200.00'),
(8, 33, 'Dubois', 'Vincent', '2234567890123', '9 rue de la Fontaine, Rennes', '0345678901', 'vincent.dubois@hotmail.com', 'Avocat', 'celibataire', '50.00'),
(9, 34, 'Petit', 'Isabelle', '1234567890123', '16 avenue des Peupliers, Nantes', '0678901234', 'isabelle.petit@yahoo.fr', 'Médecin', 'divorce', '400.00'),
(10, 35, 'Thomas', 'Lucas', '2234567890123', '2 rue du Commerce, Bordeaux', '0789012345', 'lucas.thomas@gmail.com', 'Médecin', 'divorce', '400.00');

-- --------------------------------------------------------

--
-- Structure de la table `pieces_fournir`
--

DROP TABLE IF EXISTS `pieces_fournir`;
CREATE TABLE IF NOT EXISTS `pieces_fournir` (
  `id` int NOT NULL AUTO_INCREMENT,
  `acte_id` int NOT NULL,
  `piece` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `acte_id` (`acte_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pieces_fournir`
--

INSERT INTO `pieces_fournir` (`id`, `acte_id`, `piece`) VALUES
(1, 1, 'Carte vitale'),
(2, 2, 'Ordonnance'),
(3, 3, 'Résultats d\'examens'),
(4, 4, 'Résultats d\'examens'),
(5, 5, 'Résultats d\'examens');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id` int NOT NULL AUTO_INCREMENT,
  `patient_id` int NOT NULL,
  `medecin_id` int NOT NULL,
  `acte_id` int NOT NULL,
  `date_heure` datetime NOT NULL,
  `motif` varchar(255) DEFAULT NULL,
  `pieces_fournir` text,
  `consignes` text,
  `suivi` text,
  `compte_rendu` text,
  `prix` decimal(10,2) DEFAULT NULL,
  `statut` enum('en_attente','paye') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_id` (`patient_id`),
  KEY `medecin_id` (`medecin_id`),
  KEY `acte_id` (`acte_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
