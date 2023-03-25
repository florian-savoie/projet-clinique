<?php 
// Définir le temps de validité de la session à 10 minutes
session_set_cookie_params(600);

// Démarrer la session
session_start();

require('controller/database.php');
require('model/modelagents.php');

function searchAgent(){
    
    if (!empty($_POST["search"])){
      $identifiant = $_POST["search"];
      $_SESSION['patientrechercher'] = $_POST["search"];

      $patient = searchAgentBdd($identifiant);
return $patient;
    }
  }


function updateInfosClient(){
    
    if (!empty($_POST["adresse"]) && !empty($_POST["tel"]) && !empty($_POST["email"])&& !empty($_POST["profession"])&& !empty($_POST["situationFamiliale"])){
      $adresse = $_POST["adresse"];
      $tel = $_POST["tel"];
      $email = $_POST["email"];
      $profession = $_POST["profession"];
      $situationFamiliale = $_POST["situationFamiliale"];
       UpdateInfosClientBdd($adresse,$tel,$email,$profession,$situationFamiliale);
    }
  }

  function searchnss(){
    if (!empty($_POST["nsspatien"])){
    $nss = $_POST["nsspatien"];
    $infospatientNss = searchinfosnss($nss);
    return $infospatientNss;
    }
  }


  function searchpaiment(){
    if (!empty($_POST["searchpaiement"])){
      $searchpatient = $_POST["searchpaiement"];
      $paiments = affichepaiment($searchpatient);
      
      return $paiments ;
      }
    }

   function changementstatus(){
    if (!empty($_POST["statuspayer"]) && $_POST['soldeclient']  > $_POST['prixpaiement']){
      updatesolde();
      $alertpaiement = "paiement effectée";
    }        else{
$alertpaiement = "fond insufisant";
   }
   return $alertpaiement ;
   }

   function shearchpatient(){
    if (!empty($_POST["nomPatient"]) && !empty($_POST['dateNaissance'])){
      $requete = 'SELECT nss FROM patients WHERE nom = :parametre1 AND date_naissance = :parametre2 ';
      $resultat = bdd2Bindparam($requete,$_POST["nomPatient"],$_POST["dateNaissance"]);
      $resultat = $resultat->fetchAll();
      return $resultat ;
   }}


   function rechargesolde(){
    if (!empty($_POST["nsspatient"]) && !empty($_POST['montantrecharge'])){
      $requete = 'UPDATE patients SET solde= solde+:parametre1 WHERE nss = :parametre2';
      bdd2Bindparam($requete,$_POST["montantrecharge"],$_POST["nsspatient"]);
      $requete = 'INSERT INTO depots (nss, montant, type, date_heure) VALUES (:parametre1, :parametre2, :parametre3, :parametre4)';
      bdd4Bindparam($requete, $_POST["nsspatient"], $_POST["montantrecharge"], 'depot', date('Y-m-d H:i:s'));
   }}


   function soldeentre2date(){
    if (!empty($_POST["soldedateFin"]) && !empty($_POST['soldedateDebut']) && !empty($_POST['numeronss'])){
     $datedebut = $_POST['soldedateDebut']." 00:00:00";
     $datefin = $_POST['soldedateFin']." 00:00:00";
     $requete = "SELECT * FROM depots WHERE nss= :parametre1 AND date_heure BETWEEN '{$datedebut}' AND '{$datefin}'";
     $resultat = bdd1Bindparam($requete,$_POST["numeronss"]);
     $resultat = $resultat->fetchAll();
     return $resultat ;
    }}

