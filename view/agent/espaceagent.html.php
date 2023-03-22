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
    <a class="nav-link " data-bs-toggle="tab" href="#infopatient">Informations du patient </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="tab" href="#synthesepatient">Synthese d'un patient </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " data-bs-toggle="tab" href="#paiementpatient">paiement patient</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="tab" href="#rendezvouspatient">rendez vous patient</a>
  </li>

</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container " id="infopatient">
<!-- Formulaire de recherche -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" id="search" required>
                    <button type="submit" class="btn btn-primary" value="recherchepatient" name="recherchepatient">Rechercher</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Formulaire de modification -->
<?php if (!empty($patient)): ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Modifier les informations de <?php echo $patient['nom'] . ' ' . $patient['prenom']; ?></h2>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="adresse">Adresse :</label>
                        <input type="text" class="form-control" name="adresse" id="adresse" value="<?php echo $patient['adresse']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tel">Numéro de téléphone :</label>
                        <input type="text" class="form-control" name="tel" id="tel" value="<?php echo $patient['tel']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="mail">Adresse email :</label>
                        <input type="email" class="form-control" name="mail" id="mail" value="<?php echo $patient['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="profession">Profession :</label>
                        <input type="text" class="form-control" name="profession" id="profession" value="<?php echo $patient['profession']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="situation_familiale">Situation familiale :</label>
                        <select class="form-control" name="situation_familiale" id="situation_familiale">
                            <option value="celibataire" <?php echo ($patient['situation_familiale'] == 'celibataire') ? 'selected' : ''; ?>>Célibataire</option>
                            <option value="marié" <?php echo ($patient['situation_familiale'] == 'marié') ? 'selected' : ''; ?>>Marié</option>
                            <option value="divorce" <?php echo ($patient['situation_familiale'] == 'divorce') ? 'selected' : ''; ?>>Divorcé</option>
                            <option value="veuf" <?php echo ($patient['situation_familiale'] == 'veuf') ? 'selected' : ''; ?>>Veuf</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>




  </div>
  <div class="tab-pane container " id="paiementpatient">
  <form class="col-md-6 offset-md-3 p-3 bg-light"  method="POST">
    <fieldset>
        <legend class="text-center mb-4">paiement patient </legend>

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
  <div class="tab-pane container fade" id="rendezvouspatient">...</div>
</div>
</div>

</body>
</html>