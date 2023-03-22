<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clinique</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   </body>

    <style>
        header {

            border-radius: 2rem;

            height: 40vh;
            background-image: url(assets/img/building.jpg);
            background-size: cover;
            background-position: center;
        }

       

        p {
            font-family: "source_sans_proregular";
            font-size: 16px;
        }
        .cardTeam{
            display: flex;
            justify-content: center;
        }
        .contenuText{
            background-color: rgba(243, 237, 237, 0.7);
padding: 3rem;
        }
    </style>
</head>
<header class="">
<?php
require('leyout/nav.html.php');
?>
</header>
<body>

<div class="container">
    <h1><?php if(isset($message)) echo $message ;?></h1>
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " data-bs-toggle="tab" href="#updatemdpetlogin">modifier logins et mots de passe </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="tab" href="#addmedecin">Ajouter mededin </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " data-bs-toggle="tab" href="#deletemedecin">supprimer medecin</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="tab" href="#menu1">Menu 1</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="tab" href="#menu2">Menu 2</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container " id="updatemdpetlogin">
  <form class="col-md-6 offset-md-3 p-3 bg-light"  method="POST">
    <fieldset>
        <legend class="text-center mb-4">Modification de login et mot de passe</legend>
        <div class="form-group">
            <label for="role">Sont role :</label>
            <select class="form-control" id="role" name="role">
                <option value="medecins">Médecin</option>
                <option value="patients">Client</option>
                <option value="agents">Agent</option>
                <option value="directeur">Directeur</option>
            </select>
        </div>
        <div class="form-group">
            <label for="identifiant">Ancien nom d'utilisateur :</label>
            <input class="form-control" type="text" id="identifiant" name="identifiant" value="" required>
        </div>
        <div class="form-group">
            <label for="password">Ancien mot de passe :</label>
            <input class="form-control" type="password" id="password" name="password" value="" required>
        </div>
        <div class="form-group">
            <label for="new-identifiant">Nouveau nom d'utilisateur :</label>
            <input class="form-control" type="text" id="new-identifiant" name="newidentifiant" required>
        </div>
        <div class="form-group">
            <label for="new-password">Nouveau mot de passe :</label>
            <input class="form-control" type="password" id="new-password" name="newpassword" required>
        </div>
        <div class="text-center">
            <button class="btn btn-primary"name="modifMdpLogin" value="modifMdpLogin" type="submit">Modifier</button>
        </div>
    </fieldset>
</form>

  </div>
  <div class="tab-pane container fade" id="addmedecin">
  <form class="col-md-6 offset-md-3 p-3 bg-light"  method="POST">
    <fieldset>
        <legend class="text-center mb-4">Ajouter un medecin </legend>

        <div class="form-group">
            <label for="identifiant">nom d'utilisateur :</label>
            <input class="form-control" type="text" id="identifiant" name="addMedecin" value="" required>
        </div>
        <div class="form-group">
            <label for="identifiant">nom de famille :</label>
            <input class="form-control" type="text" id="identifiant" name="addFamillinameMedecin" value="" required>
        </div>
        <div class="form-group">
            <label for="identifiant">prenom :</label>
            <input class="form-control" type="text" id="identifiant" name="addLastnameMedecin" value="" required>
        </div>
        <div class="form-group">
            <label for="identifiant">specialiter :</label>
            <input class="form-control" type="text" id="identifiant" name="addSpecialiterMedecin" value="" required>
        </div>
        <div class="form-group">
            <label for="password">mot de passe :</label>
            <input class="form-control" type="password" id="password" name="AddPasswordMedecin" value="" required>
        </div>
        <div class="text-center">
            <button class="btn btn-primary"name="addmedecin" value="addmedecin" type="submit">Ajouter</button>
        </div>
    </fieldset>
</form>


  </div>
  <div class="tab-pane container " id="deletemedecin">
  <form class="col-md-6 offset-md-3 p-3 bg-light"  method="POST">
    <fieldset>
        <legend class="text-center mb-4">Supprimer un medecin </legend>

        <div class="form-group">
            <label for="identifiant">nom du medecin :</label>
            <input class="form-control" type="text" id="identifiant" name="DeleteMedecin" value="" required>
        </div>
        <div class="form-group">
            <label for="password">mot de passe :</label>
            <input class="form-control" type="password" id="password" name="deletePasswordMedecin" value="" required>
        </div>
        <div class="text-center">
            <button class="btn btn-primary"name="deletemedecin" value="deletemedecin" type="submit">Supprimer</button>
        </div>
    </fieldset>
</form>

  </div>
  <div class="tab-pane container fade" id="menu1">...</div>
  <div class="tab-pane container fade" id="menu2">...</div>
</div>
</div>

</body>
</html>