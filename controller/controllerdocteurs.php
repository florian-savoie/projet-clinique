<?php 
// Définir le temps de validité de la session à 10 minutes
session_set_cookie_params(600);

// Démarrer la session
session_start();

require('controller/database.php');
require('model/modeldocteurs.php');