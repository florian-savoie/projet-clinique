<?php
require('controller/database.php');
require('model/modelacceuil.php');


function demandeConnexion($identifiant, $password, $role)
{
    if (!empty($identifiant) && !empty($password) && !empty($role)) {
        $resultat = verifConnexion($identifiant, $password, $role);
        if ($resultat[0]) {
            creationSession($resultat[1],$role);
header('location: moncompte.php');

        } else {
            $message = "<script>alert('Erreur de mots de passe ou d'identifiant')</script>";
            return $message;
        }
    }
}