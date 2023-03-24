<?php
require('controller/controllerdirecteur.php');
// Vérifier si l'utilisateur est connecté
if ($_SESSION['role'] == "directeur") {
   if (isset($_POST['modifMdpLogin'])) {
      if (isset($_POST["identifiant"]) && isset($_POST["password"]) && isset($_POST["newidentifiant"]) && isset($_POST["newpassword"]) && isset($_POST["role"])) {
         modifMdpLogin();
      } else {
         $message = "le formulaire n'est pas complet";
      }
   }

   if (isset($_POST['addmedecin'])) {
      if (isset($_POST["addMedecin"]) && isset($_POST["addFamillinameMedecin"]) && isset($_POST["addLastnameMedecin"]) && isset($_POST["addSpecialiterMedecin"]) && isset($_POST["AddPasswordMedecin"])) {
         Addmedecin();
      } else {
         $message = "le formulaire n'est pas complet";
      }
   }


   if (isset($_POST['deletemedecin'])) {
      if (isset($_POST["DeleteMedecin"]) && isset($_POST["deletePasswordMedecin"])) {
         deletemedecin();
      } else {
         $message = "le formulaire n'est pas complet";
      }
   }


   if (isset($_POST['addacte'])) {
      if (isset($_POST["ajoutacte"]) && isset($_POST["montantnewacte"])) {
         addacte();
      } else {
         $message = "le formulaire n'est pas complet";
      }
   }

   if (isset($_POST['deleteact'])) {
      if (isset($_POST["deleteacte"])) {
         deleteacte();
      } else {
         $message = "le formulaire n'est pas complet";
      }
   }

   if (isset($_POST['updateacte'])) {
      if (isset($_POST["updateacte"]) && isset($_POST["updatemontant"]) && isset($_POST["selecteacte"])) {
         updateacte();
      } else {
         $message = "le formulaire n'est pas complet";
      }
   }

   if (isset($_GET['modification_acte']) && $_GET['modification_acte'] == "supprimer" || isset($_GET['modification_acte']) && $_GET['modification_acte'] == "modifier") {

      $affichageacte = infosactes();
   }



   if (isset($_GET['modification_consigne']) && $_GET['modification_consigne'] == "supprimer" || isset($_GET['modification_consigne']) && $_GET['modification_consigne'] == "modifier" || isset($_GET['modification_consigne']) && $_GET['modification_consigne'] == "ajouter") {
      $affichageacte = infosactes();
      $affichageconsigne = infosconsigne();
   }

   if (isset($_POST['deleteconsigne'])) {
      if (isset($_POST["iddeleteconsigne"])) {
         deleteconsigne();
      } else {
         $message = "le formulaire n'est pas complet";
      }
   }

   if (isset($_POST['updateconsigne'])) {
      if (isset($_POST["selecteconsultation"]) && isset($_POST["updatenewconsigne"]) && isset($_POST["idupdateconsigne"])) {
         updateconsigne();
      } else {
         $message = "le formulaire n'est pas complet";
      }
   }

   if (isset($_POST['addconsigne'])) {
      if (isset($_POST["ajoutconsigne"]) && isset($_POST["selecteconsultation"])) {
         addconsigne();
      } else {
         $message = "le formulaire n'est pas complet";
      }
   }
   if (isset($_GET['ajoutepieceafournir']) && $_GET['ajoutepieceafournir'] == "supprimer" || isset($_GET['ajoutepieceafournir']) && $_GET['ajoutepieceafournir'] == "modifier" || isset($_GET['ajoutepieceafournir']) && $_GET['ajoutepieceafournir'] == "ajouter") {
      $affichageacte = infosactes();
      $requete = 'SELECT * FROM pieces_fournir';
      $affichagepiecesafournir = bdd0Bindparam($requete);
      
   }

   if (isset($_POST['addpiecefournir'])) {
      if (isset($_POST["ajoutpiecefournir"]) && isset($_POST["selectacte"])) {
         addpiecefournir();
      } else {
         $message = "le formulaire n'est pas complet";
      }
   }

   if (isset($_POST['updatepiece'])) {
      if (isset($_POST["updateidacte"]) && isset($_POST["updatenewconsigne"])&& isset($_POST["updatenewconsigne"])) {
         updatepiecefournir();
      } else {
         $message = "le formulaire n'est pas complet";
      }
   }

   if (isset($_POST['deletepiece'])) {
      if (isset($_POST["iddeletepiece"])) {
         deletepiecefournir();
      } else {
         $message = "le formulaire n'est pas complet";
      }
   }































} else {
   // Rediriger l'utilisateur sur la page d'accueil
   header('location: aceuil.php');
}
require('view/directeur/espacedirecteur.html.php');
