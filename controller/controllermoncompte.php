<?php 
// Définir le temps de validité de la session à 10 minutes
session_set_cookie_params(600);

// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if($_SESSION['connecter'] === true) {
    // Afficher les informations de la session
    require('view/moncompte.html.php');

} else {
    // Rediriger l'utilisateur sur la page d'accueil
    header('location: accueil.php');
}