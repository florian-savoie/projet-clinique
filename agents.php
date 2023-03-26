<?php
require('controller/controlleragents.php');
$identifiant = "";
echo $identifiant;
// Vérifier si l'utilisateur est connecté
if ($_SESSION['role'] == "agents") {

    if (isset($_POST['recherchepatient'])) {
        if (isset($_POST["search"])) {
            $patient =  searchAgent();
        } else {
            $message = "le formulaire n'est pas complet";
        }
    }

    if (isset($_POST['updateInfosClient'])) {
        if (isset($_POST["adresse"]) && isset($_POST["tel"]) && isset($_POST["email"]) && isset($_POST["profession"]) && isset($_POST["situationFamiliale"])) {
            updateInfosClient();
        } else {
            $message = "le formulaire n'est pas complet";
        }
    }

    if (isset($_POST['synthesepatient'])) {
        if (isset($_POST["nsspatien"])) {
            $infospatientNss =  searchnss();
            $patientNss = $infospatientNss['patient'];
            $historique = $infospatientNss['historique'];
        } else {
            $message = "le formulaire n'est pas complet";
        }
    }

    if (isset($_POST['recherchepatientPayemment'])) {
        if (isset($_POST["searchpaiement"])) {
            $paiments =  searchpaiment();
            $patientpaiments = $paiments['patient'];
            $historiquepaiments = $paiments['historique'];
        } else {
            $message = "le formulaire n'est pas complet";
        }
    }

    if (isset($_POST['statuspayer'])) {
        if (isset($_POST["searchpaiement"])) {
            $alertpaiement = changementstatus();
            $paiments =  searchpaiment();
            $patientpaiments = $paiments['patient'];
            $historiquepaiments = $paiments['historique'];
        } else {
            $message = "le formulaire n'est pas complet";
        }
    }

    if (isset($_POST['rechercherNSS'])) {
        if (isset($_POST["dateNaissance"]) && $_POST["nomPatient"]) {
            $patientnss = shearchpatient();
        } else {
            $message = "le formulaire n'est pas complet";
        }
    }

    // recharge le solde du patient 
    if (isset($_POST['rechargesolde'])) {
        if (isset($_POST["nsspatient"]) && $_POST["nsspatient"]) {
            rechargesolde();
        } else {
            $message = "le formulaire n'est pas complet";
        }
    }

    // recharge le solde du patient 
    if (isset($_POST['soldepatient2date'])) {
        if (isset($_POST["soldedateFin"]) && $_POST["numeronss"] && $_POST["soldedateDebut"]) {
            $resultat = soldeentre2date();
        } else {
            $message = "le formulaire n'est pas complet";
        }
    }

    // recherche les rdv disponible
    if (isset($_GET['rendezvous'])) {
        $medecin = affichermedecinetspecialite();
        if (isset($_POST["semainechoisie"]) && isset($_POST["categoryrdv"]) && isset($_POST["sheachmedecin"])){
            $docteurname =$_POST["sheachmedecin"];
            $categorydocteur =$_POST["categoryrdv"];
       $tableaurdv = shearchrdvdispo();
        }else {
            echo " formulaire incomplet ";
        }
    }




} else {
    // Rediriger l'utilisateur sur la page d'accueil
    header('location: aceuil.php');
}
require('view/agent/espaceagent.html.php');
