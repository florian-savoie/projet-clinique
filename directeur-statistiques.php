<?php
require('controller/controllerdirecteur.php');
// Vérifier si l'utilisateur est connecté
if ($_SESSION['role'] == "directeur") {
  
   if (isset($_GET['rdventre2date']) && isset($_GET['rdventre2date']) == "show") {
if (isset($_POST["rdventre2dates"])){
    if (isset($_POST["datedebut"]) && isset($_POST["datefin"])){
        $rdventre2dates = lesrdventre2dates();
    }
}
 } else {
         $message = "le formulaire n'est pas complet";
      }



   if (isset($_GET['patientstotal']) && isset($_GET['patientstotal']) == "show") {
    $requete = 'SELECT COUNT(*) as nbr FROM patients';
      $affichagenbrpatient = bdd0Bindparam($requete);
   } else {
         $message = "le formulaire n'est pas complet";
      }


   if (isset($_GET['soldeinferieur']) && isset($_GET['soldeinferieur']) == "show") {
    if (isset($_POST['soldeinferieur'])){ 
        if (isset($_POST['montantsoldeinferieur'])){ 
              $nbrpatientsoldeinfieur = nbrpatientsoldeinfieur();
        }
    }
       
      } else {
         $message = "le formulaire n'est pas complet";
      }


   if (isset($_GET['patienttotaldate']) && isset($_GET['patienttotaldate']) == "show") {
      $affichageannuaire = annuairemedecins();
      } else {
         $message = "le formulaire n'est pas complet";
      }





   




























} else {
   // Rediriger l'utilisateur sur la page d'accueil
   header('location: aceuil.php');
}
require('leyout/head.html.php');
require('view/directeur/directeurlesstatistique.html.php');
