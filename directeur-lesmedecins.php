<?php
require('controller/controllerdirecteur.php');
// Vérifier si l'utilisateur est connecté
if ($_SESSION['role'] == "directeur") {
  
   if (isset($_GET['annuaire']) && isset($_GET['annuaire']) == "show") {
      $affichageannuaire = annuairemedecins();
      } else {
         $message = "le formulaire n'est pas complet";
      }




   




























} else {
   // Rediriger l'utilisateur sur la page d'accueil
   header('location: aceuil.php');
}
require('leyout/head.html.php');
require('view/directeur/directeurlesmedecins.html.php');
