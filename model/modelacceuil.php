<?php 

function nbrEmployer(){
    $bdd = getdatabases();
    $requete = $bdd->prepare('SELECT role, COUNT(*) as nbr FROM employes GROUP BY role');
    $requete->execute();
    $result = $requete->fetchAll();
    $tableauNbrRole = [0, 0, 0, 0];
    foreach ($result as $row) {
        switch ($row['role']) {
            case 'agent':
                $tableauNbrRole[2] = $row['nbr'];
                break;
            case 'directeur':
                $tableauNbrRole[1] = $row['nbr'];
                break;
            case 'medecin':
                $tableauNbrRole[0] = $row['nbr'];
                break;
            case 'patient':
                $tableauNbrRole[3] = $row['nbr'];
                break;
        }
    }
    return $tableauNbrRole;
}
function verifConnexion($identifiant, $password, $role) {
    try {
        $bdd = getdatabases();
        $requete = $bdd->prepare('SELECT COUNT(*), id FROM employes WHERE username = ? AND password = ? and role = ? ');
        $requete->execute(array($identifiant, $password, $role));
        $resultat = $requete->fetch();
        if (is_array($resultat)) {
            $id = $resultat[1];
            return array($resultat[0] > 0, $id);
        } else {
            return array(false, null);
        }
    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }   
}
function creationSession($id, $role) {
    try {
        $bdd = getdatabases();
        $infoSession = $bdd->prepare('SELECT d.nom, d.prenom FROM '.$role.' d, employes p WHERE d.id = p.id AND p.id = ?');
        $infoSession->execute(array($id));
        $resultat = $infoSession->fetch();
        $nom = $resultat['nom'];
        $prenom = $resultat['prenom'];
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['role'] = $role;
        $_SESSION['connecter'] = true;
    } catch(Exception $e) {
        die('Une erreur a été trouvée : ' . $e->getMessage());
    }  
}