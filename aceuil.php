<?php
        session_start();


require('controller/controlleraceuil.php');
$message = "";
$nbr = nbrEmployer();
if (isset($_POST["connexion"]) && isset($_POST["identifiant"]) && isset($_POST["password"])&& isset($_POST["role"])) {

    $password = $_POST["password"];
    $identifiant = $_POST["identifiant"];
    $role = $_POST["role"];

   $message = demandeConnexion($identifiant, $password,$role);
}
if (isset($_SESSION['connecter']) && $_SESSION['connecter'] == true){
        header('location:moncompte.php');
}

require('view/acceuil.html.php');
