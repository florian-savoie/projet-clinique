<?php 
// Définir le temps de validité de la session à 10 minutes
session_set_cookie_params(600);

// Démarrer la session
session_start();

require('controller/database.php');
require('model/modeldocteurs.php');




function afficherMedecins(){
  $requete = "SELECT * FROM medecins"  ;
  $resultat = bdd0Bindparam($requete);
  return $resultat ;
}

function afficherPlanningDuMedecin(){
      if (!empty($_POST['idmedecin'])){
        $requete = "SELECT rdv.date_heure, patients.nom, patients.prenom
        FROM rdv
        JOIN patients ON rdv.patient_id = patients.id_patient
        WHERE rdv.medecin_id = :parametre1"  ;
        $planning = bdd1Bindparam($requete,$_POST['idmedecin']);
        $planning = $planning->fetchAll();  
        return $planning ;
    }
}