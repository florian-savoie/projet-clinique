<?php 
function searchAgentBdd($identifiant){
    try {
        $bdd = getdatabases();
        $requete = $bdd->prepare('SELECT nom ,prenom ,adresse, tel, email, profession, situation_familiale FROM patients WHERE nom = :nom');
        $requete->bindParam(':nom', $identifiant, PDO::PARAM_STR);
        $requete->execute();
        $patient = $requete->fetch();
return $patient;

    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    } 
}

