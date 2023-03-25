<?php
require('controller/controllerdocteurs.php');
$identifiant = "";
echo $identifiant;

// Vérifier si l'utilisateur est connecté
if ($_SESSION['role'] == "medecins") {

    if (isset($_GET['planing']) && $_GET['planing'] === 'show') {
        $agenda = afficherrdv();
    }



    if (isset($_GET['planingothers']) && $_GET['planingothers'] === 'show') {
        $afficherMedecins = afficherMedecins();
if (isset($_POST['idmedecin'])){
    $planning = afficherPlanningDuMedecin();
var_dump($planning);}
    }



} else {
    // Rediriger l'utilisateur sur la page d'accueil
    header('location: aceuil.php');
}
    require('view/docteur/espacedocteurs.html.php');