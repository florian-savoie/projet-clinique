<?php
require('controller/controllerdirecteur.php');
// Vérifier si l'utilisateur est connecté
if ($_SESSION['role'] == "directeur") {
    if (isset($_POST['modifMdpLogin'])){
        if (isset($_POST["identifiant"]) && isset($_POST["password"]) && isset($_POST["newidentifiant"]) && isset($_POST["newpassword"]) && isset($_POST["role"])) {
           modifMdpLogin();
        } else {
            $message = "le formulaire n'est pas complet";
        }
     }

     if (isset($_POST['addmedecin'])){
        if (isset($_POST["addMedecin"]) && isset($_POST["addFamillinameMedecin"])&& isset($_POST["addLastnameMedecin"])&& isset($_POST["addSpecialiterMedecin"])&& isset($_POST["AddPasswordMedecin"])) {
           Addmedecin();
        } else {
            $message = "le formulaire n'est pas complet";
        }
     }
    

     if (isset($_POST['deletemedecin'])){
        if (isset($_POST["DeleteMedecin"]) && isset($_POST["deletePasswordMedecin"])) {
           deletemedecin();
        } else {
            $message = "le formulaire n'est pas complet";
        }
     }
} else {
    // Rediriger l'utilisateur sur la page d'accueil
    header('location: aceuil.php');
}
    require('view/directeur/espacedirecteur.html.php');
