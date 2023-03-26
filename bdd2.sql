-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 25 mars 2023 à 16:56
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `actes_medicaux`
--

INSERT INTO `actes_medicaux` (`id`, `nom`, `prix`) VALUES
(1, 'Consultation', '50.00'),
(2, 'Radiographie', '100.00'),
(3, 'scanner ', '200.00'),
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `agents`
--

INSERT INTO `agents` (`id`, `id_agent`, `nom`, `prenom`) VALUES
(1, 16, 'Agent1Nom', 'Agent1Prenom'),
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `consignes`
--

INSERT INTO `consignes` (`id`, `acte_id`, `consigne`) VALUES
(1, 4, 'test'),
(6, 2, 'florian test'),
(4, 3, 'test'),
(5, 2, 'florian test');

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `nss` int NOT NULL,
  `date_heure` datetime NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_id` (`nss`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `depots`
--

INSERT INTO `depots` (`id`, `nss`, `date_heure`, `montant`, `type`) VALUES
(1, 2147483647, '0000-00-00 00:00:00', '150.00', 'depot'),
(2, 2147483647, '2023-03-25 13:20:06', '150.00', 'depot'),
(3, 2147483647, '2023-03-25 13:49:23', '150.00', 'paiement');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `role` enum('directeur','medecins','agents','patients') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id`, `username`, `password`, `role`) VALUES
(1, 'gfgfd', 'gdfgd', 'directeur'),
(2, 'directeur2', 'motdepasse2', 'directeur'),
(3, 'directeur3', 'motdepasse3', 'directeur'),
(4, 'docteur1', 'motdepasse4', 'medecins'),
(5, 'docteur2', 'motdepasse5', 'medecins'),
(6, 'docteur3', 'motdepasse6', 'medecins'),
(7, 'docteur4', 'motdepasse7', 'medecins'),
(8, 'docteur5', 'motdepasse8', 'medecins'),
(9, 'docteur6', 'motdepasse9', 'medecins'),
(10, 'docteur7', 'motdepasse10', 'medecins'),
(11, 'docteur8', 'motdepasse11', 'medecins'),
(12, 'docteur9', 'motdepasse12', 'medecins'),
(13, 'docteur10', 'motdepasse13', 'medecins'),
(14, 'docteur11', 'motdepasse14', 'medecins'),
(15, 'docteur12', 'motdepasse15', 'medecins'),
(16, 'agent1', 'motdepasse16', 'agents'),
(17, 'agent2', 'motdepasse17', 'agents'),
(18, 'agent3', 'motdepasse18', 'agents'),
(19, 'agent4', 'motdepasse19', 'agents'),
(20, 'agent5', 'motdepasse20', 'agents'),
(21, 'agent6', 'motdepasse21', 'agents'),
(22, 'agent7', 'motdepasse22', 'agents'),
(23, 'agent8', 'motdepasse23', 'agents'),
(24, 'agent9', 'motdepasse24', 'agents'),
(25, 'agent10', 'motdepasse25', 'agents'),
(26, 'patient1', 'motdepasse26', 'patients'),
(27, 'patient2', 'motdepasse27', 'patients'),
(28, 'patient3', 'motdepasse28', 'patients'),
(29, 'patient4', 'motdepasse29', 'patients'),
(30, 'patient5', 'motdepasse30', 'patients'),
(31, 'patient6', 'motdepasse31', 'patients'),
(32, 'patient7', 'motdepasse32', 'patients'),
(33, 'patient8', 'motdepasse33', 'patients'),
(34, 'patient9', 'motdepasse34', 'patients'),
(35, 'patient10', 'motdepasse35', 'patients'),
(39, 'florian13', 'florian', 'medecins'),
(40, 'florian13', 'florian', 'medecins');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(12, 15, 'Docteur12Nom', 'Docteur12Prenom', 'Gynécologue'),
(16, 39, 'savoie', 'test', 'test'),
(17, 39, 'savoie', 'test', 'test');

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
  `date_naissance` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_patient` (`id_patient`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`id`, `id_patient`, `nom`, `prenom`, `nss`, `adresse`, `tel`, `email`, `profession`, `situation_familiale`, `solde`, `date_naissance`) VALUES
(1, 26, 'Durand', 'Sophie', '21234567890123', '3 rue de la Gare, Paris', '0123456789', 'sophie.durand@gmail.com', 'Infirmière', 'celibataire', '1000.00', '1990-01-01'),
(2, 27, 'Lefevre', 'Jean', '12345678901237', '8 rue de la Paix, Lyon', '0678901234', 'jean.lefevre@hotmail.com', 'Ingénieur', 'veuf', '200.00', '1960-02-02'),
(3, 28, 'Morel', 'Marie', '22345678901234', '100 chemin de l\'est', '0458650512', 'floo@msn.fr', '$profession', 'celibataire', '2950.00', '1985-03-03'),
(4, 29, 'Dupont', 'Pierre', '2', '23 avenue des Champs-Élysées, Paris', '0789012345', 'pierre.dupont@gmail.com', 'Comptable', 'marie', '50.00', '1970-04-04'),
(5, 30, 'Garcia', 'Laura', '2234567890123', '5 avenue de la Liberté, Toulouse', '0234567890', 'laura.garcia@hotmail.com', 'Infirmière', 'celibataire', '100.00', '1995-05-05'),
(6, 31, 'Martin', 'David', '22345767890123', '12 rue des Roses, Nice', '0567890123', 'david.martin@yahoo.fr', 'Informaticien', 'celibataire', '0.00', '1980-06-06'),
(7, 32, 'Leroy', 'Céline', '81234567890123', '17 avenue du Général de Gaulle, Marseille', '0789123456', 'celine.leroy@gmail.com', 'Enseignante', 'marie', '200.00', '1992-07-07'),
(8, 33, 'Dubois', 'Vincent', '22345667890123', '9 rue de la Fontaine, Rennes', '0345678901', 'vincent.dubois@hotmail.com', 'Avocat', 'celibataire', '50.00', '1975-08-08'),
(9, 34, 'Petit', 'Isabelle', '12374567890123', '16 avenue des Peupliers, Nantes', '0678901234', 'isabelle.petit@yahoo.fr', 'Médecin', 'divorce', '200.00', '1988-09-09'),
(10, 35, 'Thomas', 'Lucas', '22345567890123', '2 rue du Commerce, Bordeaux', '0789012345', 'lucas.thomas@gmail.com', 'Médecin', 'divorce', '400.00', '1971-10-10');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pieces_fournir`
--

INSERT INTO `pieces_fournir` (`id`, `acte_id`, `piece`) VALUES
(1, 1, 'Carte vitale'),
(2, 2, 'Ordonnance'),
(3, 3, 'resultat d\'examens du jour anuel'),
(4, 3, 'resultat semaine'),
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
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id`, `patient_id`, `medecin_id`, `acte_id`, `date_heure`, `motif`, `pieces_fournir`, `consignes`, `suivi`, `compte_rendu`, `prix`, `statut`) VALUES
(31, 29, 4, 2, '2023-03-23 09:53:46', 'Cardiologue', 'Aucune pièce à fournir', 'Aucune consigne', 'Aucun suivi', 'Aucun compte rendu', '100.00', 'en_attente'),
(32, 32, 4, 3, '2023-03-24 09:53:46', 'Chirurgien', 'Aucune pièce à fournir', 'Aucune consigne', 'Aucun suivi', 'Aucun compte rendu', '200.00', 'en_attente'),
(33, 27, 8, 3, '2023-03-24 00:00:00', 'Rhumatologue', 'Aucune pièce à fournir', 'Aucune consigne', 'Aucun suivi', 'Aucun compte rendu', '200.00', 'paye'),
(34, 29, 4, 3, '2023-03-23 09:53:46', 'Gynécologue', 'Aucune pièce à fournir', 'Aucune consigne', 'Aucun suivi', 'Aucun compte rendu', '200.00', 'paye'),
(35, 27, 8, 2, '2023-03-25 09:53:46', 'Rhumatologue', 'Aucune pièce à fournir', 'Aucune consigne', 'Aucun suivi', 'Aucun compte rendu', '100.00', 'en_attente'),
(36, 28, 4, 2, '2023-03-20 00:53:46', 'Cardiologue', 'Aucune pièce à fournir', 'Aucune consigne', 'Aucun suivi', 'Aucun compte rendu', '150.00', 'paye'),
(37, 31, 6, 4, '2020-03-25 09:53:46', 'Psychiatre', 'Aucune pièce à fournir', 'Aucune consigne', 'Aucun suivi', 'Aucun compte rendu', '300.00', 'en_attente'),
(38, 34, 4, 1, '2023-01-27 09:53:46', 'Neurologue', 'Aucune pièce à fournir', 'Aucune consigne', 'Aucun suivi', 'Aucun compte rendu', '50.00', 'paye'),
(39, 31, 3, 5, '2023-03-23 09:53:46', 'Neurologue', 'Aucune pièce à fournir', 'Aucune consigne', 'Aucun suivi', 'Aucun compte rendu', '500.00', 'en_attente'),
(40, 32, 2, 2, '2023-03-23 09:53:46', 'Gastro-entérologue', 'Aucune pièce à fournir', 'Aucune consigne', 'Aucun suivi', 'Aucun compte rendu', '100.00', 'en_attente');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
