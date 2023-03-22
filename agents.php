<?php
require('controller/controlleragents.php');
// Vérifier si l'utilisateur est connecté
if ($_SESSION['role'] == "agents") {

    if (isset($_POST['recherchepatient'])){
        if (isset($_POST["search"])){
            $patient =  searchAgent();
        } else {
            $message = "le formulaire n'est pas complet";
        }
     }
    




} else {
    // Rediriger l'utilisateur sur la page d'accueil
    header('location: aceuil.php');
}
    require('view/agent/espaceagent.html.php');