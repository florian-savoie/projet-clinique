<?php 
// Définir le temps de validité de la session à 10 minutes
session_set_cookie_params(600);

// Démarrer la session
session_start();

require('controller/database.php');
require('model/modeldirecteur.php');

function modifMdpLogin(){
    
  if (!empty($_POST["identifiant"]) && !empty($_POST["password"]) && !empty($_POST["newidentifiant"]) && !empty($_POST["newpassword"]) && !empty($_POST["role"])){
    $identifiant = $_POST["identifiant"];
    $password = $_POST["password"];
    $newidentifiant = $_POST["newidentifiant"];
    $newpassword = $_POST["newpassword"];
    $role = $_POST["role"];
  updateMdpLogin($identifiant,$password,$newidentifiant,$newpassword,$role);
  }
}

function Addmedecin(){
    
    if (!empty($_POST["addMedecin"]) && !empty($_POST["addFamillinameMedecin"])&& !empty($_POST["addLastnameMedecin"])&& !empty($_POST["addSpecialiterMedecin"])&& !empty($_POST["AddPasswordMedecin"])){
      $addMedecin = $_POST["addMedecin"];
      $addFamillinameMedecin = $_POST["addFamillinameMedecin"];
      $addLastnameMedecin = $_POST["addLastnameMedecin"];
      $addSpecialiterMedecin = $_POST["addSpecialiterMedecin"];
      $AddPasswordMedecin = $_POST["AddPasswordMedecin"];
      addBddMedecin($addMedecin,$addFamillinameMedecin,$addLastnameMedecin,$addSpecialiterMedecin,$AddPasswordMedecin);
    }
  }

  function deletemedecin(){
    
    if (!empty($_POST["DeleteMedecin"]) && !empty($_POST["deletePasswordMedecin"])){
      $identifiant = $_POST["DeleteMedecin"];
      $password = $_POST["deletePasswordMedecin"];

    deleteBddMedecin($identifiant,$password);
    }
  }

function addacte(){
  if (!empty($_POST["ajoutacte"]) && !empty($_POST["montantnewacte"])){
    $ajoutacte = $_POST["ajoutacte"];
    $montantacte = $_POST["montantnewacte"];
    addActeBdd($ajoutacte,$montantacte);
  }
}
function deleteacte(){
  if (!empty($_POST["deleteacte"])){
    actebdddelete();
  }
}

function updateacte(){
  if (!empty($_POST["updateacte"]) && !empty($_POST["updatemontant"]) && !empty($_POST["selecteacte"])){
updateactebdd();
}
}


function deleteconsigne(){
  if (!empty($_POST["iddeleteconsigne"])){
    consignebdddelete();
  }
}

function updateconsigne(){
  if (!empty($_POST["selecteconsultation"]) && !empty($_POST["updatenewconsigne"]) && !empty($_POST["idupdateconsigne"])){
updateaconsigne();
}
}










