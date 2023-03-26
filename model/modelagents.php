<?php

function bdd0Bindparam($requete){
 
    try {
        $bdd = getdatabases();
        $showacte = $bdd->prepare($requete);
        $showacte->execute();
        $affichageacte = $showacte->fetchAll(); 
        return $affichageacte;
    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }  
}

function bdd1Bindparam($requete,$parametre1){
    try {
        $bdd = getdatabases();
        $requete = $bdd->prepare($requete);
        $requete->bindParam(':parametre1', $parametre1);
        $requete->execute();
        return $requete;

    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }  


}

function bdd2Bindparam($requete,$parametre1,$parametre2){
    try {
        $bdd = getdatabases();
        $requete = $bdd->prepare($requete);
        $requete->bindParam(':parametre1', $parametre1);
        $requete->bindParam(':parametre2', $parametre2);
        $requete->execute();
        return $requete;
    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }  


}


function bdd3Bindparam($requete,$parametre1,$parametre2,$parametre3){
    try {
        $bdd = getdatabases();
        $requete = $bdd->prepare($requete);
        $requete->bindParam(':parametre1', $parametre1);
        $requete->bindParam(':parametre2', $parametre2);
        $requete->bindParam(':parametre3', $parametre3);
        $requete->execute();
        return $requete;
    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }  


}


function bdd4Bindparam($requete,$parametre1,$parametre2,$parametre3,$parametre4){
    try {
        $bdd = getdatabases();
        $requete = $bdd->prepare($requete);
        $requete->bindParam(':parametre1', $parametre1);
        $requete->bindParam(':parametre2', $parametre2);
        $requete->bindParam(':parametre3', $parametre3);
        $requete->bindParam(':parametre4', $parametre4);
        $requete->execute();
        return $requete;

    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }  
}

function bdd7Bindparam($requete,$parametre1,$parametre2,$parametre3,$parametre4,$parametre5,$parametre6,$parametre7){
    try {
        $bdd = getdatabases();
        $requete = $bdd->prepare($requete);
        $requete->bindParam(':parametre1', $parametre1);
        $requete->bindParam(':parametre2', $parametre2);
        $requete->bindParam(':parametre3', $parametre3);
        $requete->bindParam(':parametre4', $parametre4);
        $requete->bindParam(':parametre5', $parametre5);
        $requete->bindParam(':parametre6', $parametre6);
        $requete->bindParam(':parametre7', $parametre7);
        $requete->execute();
        return $requete;

    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }  
}


function searchAgentBdd($identifiant)
{
    try {
        $bdd = getdatabases();
        $requete = $bdd->prepare('SELECT nom ,prenom ,adresse, tel, email, profession, situation_familiale FROM patients WHERE nom = :nom');
        $requete->bindParam(':nom', $identifiant, PDO::PARAM_STR);
        $requete->execute();
        $patient = $requete->fetch();
        return $patient;
    } catch (Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }
}

function UpdateInfosClientBdd($adresse, $tel, $email, $profession, $situationFamiliale)
{
    try {
        $bdd = getdatabases();
        $update = $bdd->prepare('UPDATE patients SET adresse=:adresse, tel=:tel, email=:email, profession=:profession, situation_familiale=:situationFamiliale WHERE nom=:nom');
        $update->bindParam(":adresse", $adresse);
        $update->bindParam(":tel", $tel);
        $update->bindParam(":email", $email);
        $update->bindParam(":profession", $profession);
        $update->bindParam(":situationFamiliale", $situationFamiliale);
        $update->bindParam(":nom", $_SESSION['patientrechercher']);
        $update->execute();
    } catch (Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }
}

function searchinfosnss($nss)
{

    try {
        $bdd = getdatabases();
        $infospatient = $bdd->prepare('SELECT solde,id_patient,nom ,prenom ,adresse, tel, email, profession, situation_familiale FROM patients WHERE nss = :nss');
        $infospatient->bindParam(':nss', $nss, PDO::PARAM_INT);
        $infospatient->execute();
        $patientNss = $infospatient->fetch();
        $id = $patientNss['id_patient'];

        $infoshistorique = $bdd->prepare('SELECT patient_id ,medecin_id ,acte_id, date_heure, motif, pieces_fournir, consignes, suivi, compte_rendu, prix, statut FROM rdv WHERE patient_id = :id');
        $infoshistorique->bindParam(':id', $id, PDO::PARAM_INT);
        $infoshistorique->execute();
        $historique = $infoshistorique->fetchall();
        return array('patient' => $patientNss, 'historique' => $historique);
    } catch (Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }
}

function affichepaiment($searchpatient){
    try {
        $bdd = getdatabases();
        $infospaiement = $bdd->prepare('SELECT solde,id_patient,nom ,prenom ,adresse, tel, email, profession, situation_familiale FROM patients WHERE nom = :nom');
        $infospaiement->bindParam(':nom', $searchpatient, PDO::PARAM_STR);
        $infospaiement->execute();
        $infospaiement = $infospaiement->fetch();
        $id = $infospaiement['id_patient'];

        $infoshistorique = $bdd->prepare('SELECT id,patient_id ,medecin_id ,acte_id, date_heure, motif, pieces_fournir, consignes, suivi, compte_rendu, prix, statut FROM rdv WHERE patient_id = :id');
        $infoshistorique->bindParam(':id', $id, PDO::PARAM_INT);
        $infoshistorique->execute();
        $historique = $infoshistorique->fetchall();
        return array('patient' => $infospaiement, 'historique' => $historique);
    } catch (Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }
}

function updatesolde()
    {
        try {
            $bdd = getdatabases();
            $updatestatus = $bdd->prepare('UPDATE rdv SET statut="paye" WHERE id=:id');
            $updatestatus->bindParam(":id", $_POST["statuspayer"]);
            $updatestatus->execute();
            $newssolde = $_POST['soldeclient']  - $_POST['prixpaiement'] ;
            $id = $_POST['id_patient'];
            
            $updatesolde = $bdd->prepare('UPDATE patients SET solde=:newssolde WHERE id_patient=:id');
            $updatesolde->bindParam(":newssolde", $newssolde);
            $updatesolde->bindParam(":id", $id);
            $updatesolde->execute();
            $id = "26";
            $requete = 'SELECT nss FROM patients WHERE id_patient=:parametre1';
            $resultat = bdd1Bindparam($requete,$id);
            $afficher = $resultat->fetch();
            $nss = $afficher["nss"];
         
            $requete  = 'INSERT INTO depots (nss, montant, type, date_heure) VALUES (:parametre1, :parametre2, :parametre3, :parametre4)';
            bdd4Bindparam($requete, $nss, $_POST["prixpaiement"], 'paiement', date('Y-m-d H:i:s'));
        } catch (Exception $e) {
            die('Une erreur a été trouvée :'. $id . $e->getMessage());
        }
    }
