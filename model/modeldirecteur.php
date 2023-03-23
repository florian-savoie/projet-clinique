<?php 
function updateMdpLogin($identifiant, $password, $newidentifiant, $newpassword, $role) {
    try {
        $bdd = getdatabases();
        $requete = $bdd->prepare('UPDATE employes SET username = :newidentifiant, password = :newpassword WHERE username = :identifiant AND password = :password AND role = :role');
        $requete->bindParam(':identifiant', $identifiant, PDO::PARAM_STR);
        $requete->bindParam(':password', $password, PDO::PARAM_STR);
        $requete->bindParam(':newidentifiant', $newidentifiant, PDO::PARAM_STR);
        $requete->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
        $requete->bindParam(':role', $role, PDO::PARAM_STR);
        $requete->execute();
        $requete->closeCursor();
        return true;
    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }  
}

function addBddMedecin($addMedecin,$addFamillinameMedecin,$addLastnameMedecin,$addSpecialiterMedecin,$AddPasswordMedecin)
{
    try {
        $bdd = getdatabases();
        $requete = $bdd->prepare('INSERT INTO employes (username, password, role) VALUES (:username, :password, "medecins")');
        $requete->bindParam(':username', $addMedecin, PDO::PARAM_STR);
        $requete->bindParam(':password', $AddPasswordMedecin, PDO::PARAM_STR);
        $requete->execute();

        $recupid = $bdd->prepare('SELECT id FROM employes WHERE username = :username AND password = :password');
        $recupid->bindParam(':username', $addMedecin);
        $recupid->bindParam(':password', $AddPasswordMedecin);
        $recupid->execute();
        $id = $recupid->fetchColumn();   
    
    $insertTableMedecin = $bdd->prepare('INSERT INTO medecins (	id_medecin ,nom, prenom, specialite) VALUES (:id ,:nom, :prenom, :specialite)');
    $insertTableMedecin->bindParam(':nom', $addFamillinameMedecin, PDO::PARAM_STR);
    $insertTableMedecin->bindParam(':prenom', $addLastnameMedecin, PDO::PARAM_STR);
    $insertTableMedecin->bindParam(':specialite', $addSpecialiterMedecin, PDO::PARAM_STR);
    $insertTableMedecin->bindParam(':id', $id, PDO::PARAM_INT);
    $insertTableMedecin->execute();
    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }  
}

function deleteBddMedecin($identifiant,$password) {
    try {
        $bdd = getdatabases();

        $recupid = $bdd->prepare('SELECT id FROM employes WHERE username = :username AND password = :password AND role = "medecins"');
        $recupid->bindParam(':username', $identifiant);
        $recupid->bindParam(':password', $password);
        $recupid->execute();
        $id = $recupid->fetchColumn();  

        $requete = $bdd->prepare('DELETE FROM employes WHERE id = :id');
        $requete->bindParam(':id', $id, PDO::PARAM_INT);
        $requete->execute();

        $deleteTableMedecin = $bdd->prepare('DELETE FROM medecins WHERE id_medecin = :id');
        $deleteTableMedecin->bindParam(':id', $id, PDO::PARAM_INT);
        $deleteTableMedecin->execute();
    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }  
}
function addActeBdd($ajoutacte,$montantacte){
    try {
        $bdd = getdatabases();

        $addactebdd = $bdd->prepare('INSERT INTO actes_medicaux (nom, prix) VALUES (:ajoutacte, :montantacte)');
        $addactebdd->bindParam(':ajoutacte', $ajoutacte);
        $addactebdd->bindParam(':montantacte', $montantacte);
        $addactebdd->execute();
    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }  
}
