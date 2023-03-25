<?php

function bdd0Bindparam($requete){
 
    try {
        $bdd = getdatabases();
        $showacte = $bdd->prepare($requete);
        $showacte->execute();
        $affichageacte = $showacte->fetchAll(); 
        return $affichageacte;
    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }  
}

function bdd1Bindparam($requete,$parametre1){
    try {
        $bdd = getdatabases();
        $requete = $bdd->prepare($requete);
        $requete->bindParam(':parametre1', $parametre1);
        $requete->execute();
        return $requete;
    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }  


}

function bdd2Bindparam($requete,$parametre1,$parametre2){
    try {
        $bdd = getdatabases();
        $requete = $bdd->prepare($requete);
        $requete->bindParam(':parametre1', $parametre1);
        $requete->bindParam(':parametre2', $parametre2);
        $requete->execute();
        return $requete;
    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }  


}


function bdd3Bindparam($requete,$parametre1,$parametre2,$parametre3){
    try {
        $bdd = getdatabases();
        $requete = $bdd->prepare($requete);
        $requete->bindParam(':parametre1', $parametre1);
        $requete->bindParam(':parametre2', $parametre2);
        $requete->bindParam(':parametre3', $parametre3);
        $requete->execute();
        return $requete;
    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }  


}


function bdd4Bindparam($requete,$parametre1,$parametre2,$parametre3,$parametre4){
    try {
        $bdd = getdatabases();
        $requete = $bdd->prepare($requete);
        $requete->bindParam(':parametre1', $parametre1);
        $requete->bindParam(':parametre2', $parametre2);
        $requete->bindParam(':parametre3', $parametre3);
        $requete->bindParam(':parametre4', $parametre4);
        $requete->execute();
        return $requete;

    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }  
}

function afficherrdv(){
    try {
        $bdd = getdatabases();
        $recupagenda = $bdd->prepare('SELECT rdv.date_heure, patients.nom, patients.prenom
        FROM rdv
        JOIN patients ON rdv.patient_id = patients.id_patient
        WHERE rdv.medecin_id = :id');
        $recupagenda->bindParam(':id', $_SESSION['id']);
        $recupagenda->execute();
        $agenda = $recupagenda->fetchAll();  
        return $agenda;
    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }  
}