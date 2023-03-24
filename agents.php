<?php
require('controller/controlleragents.php');
$identifiant = "";
echo $identifiant;
// Vérifier si l'utilisateur est connecté
if ($_SESSION['role'] == "agents") {

    if (isset($_POST['recherchepatient'])){
        if (isset($_POST["search"])){
            $patient =  searchAgent();
        } else {
            $message = "le formulaire n'est pas complet";
        }
     }
    
     if (isset($_POST['updateInfosClient'])){
        if (isset($_POST["adresse"])&& isset($_POST["tel"])&& isset($_POST["email"])&& isset($_POST["profession"])&& isset($_POST["situationFamiliale"])){
            updateInfosClient();
        } else {
            $message = "le formulaire n'est pas complet";
        }
     }

     if (isset($_POST['synthesepatient'])){
        if (isset($_POST["nsspatien"])){
         $infospatientNss =  searchnss();
         $patientNss = $infospatientNss['patient'];
         $historique = $infospatientNss['historique'];
         
        } else {
            $message = "le formulaire n'est pas complet";
        }
     }

     if (isset($_POST['recherchepatientPayemment'])){
        if (isset($_POST["searchpaiement"])){
            $paiments =  searchpaiment();
            $patientpaiments = $paiments['patient'];
            $historiquepaiments = $paiments['historique'];
        } else {
            $message = "le formulaire n'est pas complet";
        }
     }

     if (isset($_POST['statuspayer'])){
        if (isset($_POST["searchpaiement"])){
            $alertpaiement= changementstatus();
            $paiments =  searchpaiment();
            $patientpaiments = $paiments['patient'];
            $historiquepaiments = $paiments['historique'];
            
        } else {
            $message = "le formulaire n'est pas complet";
        }
     }

     if (isset($_POST['rechercherNSS'])){
        if (isset($_POST["dateNaissance"]) && $_POST["nomPatient"]){
            $patientnss= shearchpatient();
        } else {
            $message = "le formulaire n'est pas complet";
        }
     }


} else {
    // Rediriger l'utilisateur sur la page d'accueil
    header('location: aceuil.php');
}
    require('view/agent/espaceagent.html.php');