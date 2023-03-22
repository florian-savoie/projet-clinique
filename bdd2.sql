-- Table des employés
CREATE TABLE employes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL,
  role ENUM('agent', 'medecin', 'directeur,patient') NOT NULL
);

-- Table des agents d'accueil
CREATE TABLE agents (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_agent INT,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  FOREIGN KEY (id_agent) REFERENCES employes(id)
);

-- Table du directeur
CREATE TABLE directeur (
  id INT AUTO_INCREMENT PRIMARY KEY,
    id_directeur INT,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  FOREIGN KEY (id_directeur) REFERENCES employes(id)
);

-- Table des médecins
CREATE TABLE medecins (
  id INT AUTO_INCREMENT PRIMARY KEY,
    id_medecin INT,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  specialite VARCHAR(50) NOT NULL,
  FOREIGN KEY (id_medecin) REFERENCES employes(id)
);



-- Table des patients
CREATE TABLE patients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_patient INT ,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  nss VARCHAR(15) NOT NULL,
  adresse VARCHAR(255),
  tel VARCHAR(20),
  email VARCHAR(50),
  profession VARCHAR(50),
  situation_familiale ENUM('marie', 'celibataire', 'divorce', 'veuf'),
  solde DECIMAL(10, 2),
    FOREIGN KEY (id_patient) REFERENCES employes(id)

);


-- Table des actes médicaux
CREATE TABLE actes_medicaux (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(50) NOT NULL,
  prix DECIMAL(10, 2) NOT NULL
);



-- Table des rdv
CREATE TABLE rdv (
  id INT AUTO_INCREMENT PRIMARY KEY,
  patient_id INT NOT NULL,
  medecin_id INT NOT NULL,
  acte_id INT NOT NULL,
  date_heure DATETIME NOT NULL,
  motif VARCHAR(255),
  pieces_fournir TEXT,
  consignes TEXT,
  suivi TEXT,
  compte_rendu TEXT,
  prix DECIMAL(10, 2),
  statut ENUM('en_attente', 'paye') NOT NULL,
  FOREIGN KEY (patient_id) REFERENCES patients(id),
  FOREIGN KEY (medecin_id) REFERENCES medecins(id),
  FOREIGN KEY (acte_id) REFERENCES actes_medicaux(id)
);

-- Table des créneaux horaires bloqués pour les médecins
CREATE TABLE creneaux_bloques (
  id INT AUTO_INCREMENT PRIMARY KEY,
  medecin_id INT NOT NULL,
  date_heure_debut DATETIME NOT NULL,
  date_heure_fin DATETIME NOT NULL,
  FOREIGN KEY (medecin_id) REFERENCES medecins(id)
);

-- Table des encaissements
CREATE TABLE encaissements (
  id INT AUTO_INCREMENT PRIMARY KEY,
  patient_id INT NOT NULL,
  date_heure DATETIME NOT NULL,
  montant DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (patient_id) REFERENCES patients(id)
);

-- Table des dépôts sur les comptes des patients
CREATE TABLE depots (
  id INT AUTO_INCREMENT PRIMARY KEY,
  patient_id INT NOT NULL,
  date_heure DATETIME NOT NULL,
  montant DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (patient_id) REFERENCES patients(id)
);

-- Table des pièces à fournir pour chaque acte médical
CREATE TABLE pieces_fournir (
  id INT AUTO_INCREMENT PRIMARY KEY,
  acte_id INT NOT NULL,
  piece TEXT NOT NULL,
  FOREIGN KEY (acte_id) REFERENCES actes_medicaux(id)
);

-- Table des consignes pour chaque acte médical
CREATE TABLE consignes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  acte_id INT NOT NULL,
  consigne TEXT NOT NULL,
  FOREIGN KEY (acte_id) REFERENCES actes_medicaux(id)
);