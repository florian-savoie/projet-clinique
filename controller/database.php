<?php

function getdatabases(){
    try{
    $bdd = new PDO('mysql:host=localhost;dbname=clinique;charset=utf8;', 'root', '');
    return $bdd ;
}catch(Exception $e){
    die('Une erreur a été trouvée : ' . $e->getMessage());
}    
}





