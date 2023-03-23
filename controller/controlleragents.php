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