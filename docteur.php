<?php
require('controller/controllerdocteurs.php');
$identifiant = "";
echo $identifiant;

// Vérifier si l'utilisateur est connecté
if ($_SESSION['role'] == "medecins") {

    if (isset($_GET['planing']) && $_GET['planing'] === 'show') {
        $agenda = afficherrdv();
var_dump($agenda);
    }



} else {
    // Rediriger l'utilisateur sur la page d'accueil
    header('location: aceuil.php');
}
    require('view/docteur/espacedocteurs.html.php');