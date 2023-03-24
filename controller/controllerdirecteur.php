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

function addconsigne(){
  if (!empty($_POST["selecteconsultation"]) && !empty($_POST["ajoutconsigne"])){
  $requete = 'INSERT INTO consignes (acte_id , consigne) VALUES (:parametre1 ,:parametre2)'; 
   bdd2Bindparam($requete,$_POST["selecteconsultation"],($_POST["ajoutconsigne"]));

}
}

function addpiecefournir(){
  if (!empty($_POST["ajoutpiecefournir"]) && !empty($_POST["selectacte"])){
  $requete = 'INSERT INTO pieces_fournir (piece , acte_id) VALUES (:parametre1 ,:parametre2)'; 
   bdd2Bindparam($requete,$_POST["ajoutpiecefournir"],$_POST["selectacte"]);
}
}

function updatepiecefournir(){
  if (!empty($_POST["idupdateconsigne"]) && !empty($_POST["updateidacte"])&& !empty($_POST["updatenewconsigne"])){
  $requete = 'UPDATE  pieces_fournir SET acte_id = :parametre2 , piece = :parametre3 WHERE id = :parametre1';
   bdd3Bindparam($requete,$_POST["idupdateconsigne"],$_POST["updateidacte"],$_POST["updatenewconsigne"]);
}
}
function deletepiecefournir(){
  if (!empty($_POST["iddeletepiece"])){
    $requete = 'DELETE FROM pieces_fournir WHERE id =:parametre1';
    bdd1Bindparam($requete,$_POST["iddeletepiece"]);  }
}

function annuairemedecins(){
  $requete = 'SELECT * FROM medecins';
  $affichageannuaire = bdd0Bindparam($requete);
  return $affichageannuaire ;
}

function lesrdventre2dates(){
if (!empty($_POST["datedebut"]) && !empty($_POST["datefin"])) {
  $datedebut = $_POST["datedebut"]." 00:00:00";
  $datefin = $_POST["datefin"]." 00:00:00";
  $requete = 'SELECT * FROM rdv WHERE date_heure BETWEEN \''.$datedebut.'\' AND \''.$datefin.'\'';
  $affichageannuaire = bdd0Bindparam($requete);
  return $affichageannuaire ;
}
}

function nbrpatientsoldeinfieur(){
  if (!empty($_POST["montantsoldeinferieur"])) {
    $requete = 'SELECT COUNT(*) AS nombre_de_lignes FROM patients WHERE solde < :parametre1';
    $resultat = bdd1Bindparam($requete,$_POST["montantsoldeinferieur"]);
    $resultat = $resultat->fetchAll();
    return $resultat ;
  }
}



