<?php
function afficherrdv(){
    try {
        $bdd = getdatabases();
echo $_SESSION['id'] ;
        $recupagenda = $bdd->prepare('SELECT date_heure , patient_id FROM rdv WHERE medecin_id=:id');
        $recupagenda->bindParam(':id', $_SESSION['id']);
        $recupagenda->execute();
        $agenda = $recupagenda->fetchAll();  
        return $agenda;
    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }  
}