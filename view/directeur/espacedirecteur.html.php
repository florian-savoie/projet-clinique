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

        .cardTeam {
            display: flex;
            justify-content: center;
        }

        .contenuText {
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
        <h1><?php if (isset($message)) echo $message; ?></h1>
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
                <a class="nav-link" data-bs-toggle="tab" href="#ajoutacte">Ajout/modifier/suprimer actes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#ajouteconsigne">Ajout/modifier/suprimer consignes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#ajoutepieceafournir">Ajout/modifier/suprimer pieces a fournir</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane container " id="updatemdpetlogin">
                <form class="col-md-6 offset-md-3 p-3 bg-light" method="POST">
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
                            <button class="btn btn-primary" name="modifMdpLogin" value="modifMdpLogin" type="submit">Modifier</button>
                        </div>
                    </fieldset>
                </form>

            </div>
            <div class="tab-pane container fade" id="addmedecin">
                <form class="col-md-6 offset-md-3 p-3 bg-light" method="POST">
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
                            <button class="btn btn-primary" name="addmedecin" value="addmedecin" type="submit">Ajouter</button>
                        </div>
                    </fieldset>
                </form>


            </div>
            <div class="tab-pane container " id="deletemedecin">
                <form class="col-md-6 offset-md-3 p-3 bg-light" method="POST">
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
                            <button class="btn btn-primary" name="deletemedecin" value="deletemedecin" type="submit">Supprimer</button>
                        </div>
                    </fieldset>
                </form>

            </div>
  <!-- ajouter supprimer modifier acte  -->
            <div class="tab-pane container fade" id="ajoutacte">

                <form class="col-md-6 offset-md-3 p-3 bg-light" method="GET">
                    <fieldset>
                        <legend class="text-center mb-4">action modification d'acte</legend>

                        <div class="form-group">
                            <label for="modification_acte">quelle action souhaitez vous faire :</label>
                            <select class="form-control" name="modification_acte" id="modification_acte">
                                <option value="ajouter">ajouter</option>
                                <option value="supprimer">supprimer</option>
                                <option value="modifier">modifier</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" name="" value="" type="submit">choisir</button>
                        </div>
                    </fieldset>
                </form>
                <?php if (isset($_GET['modification_acte']) && $_GET['modification_acte'] == "ajouter") { ?>

                    <form class="col-md-6 offset-md-3 p-3 bg-light" method="POST">
                        <fieldset>
                            <legend class="text-center mb-4">Ajouter un acte </legend>

                            <div class="form-group">
                                <label for="ajoutacte">Type d'acte</label>
                                <input class="form-control" type="text" id="ajoutacte" name="ajoutacte" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="montantnewacte">montant de l'acte </label>
                                <input class="form-control" type="text" id="montantnewacte" name="montantnewacte" value="" required>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" name="addacte" value="addacte" type="submit">ajouter</button>
                            </div>
                        </fieldset>
                    </form>
                <?php } ?>




                <?php if (isset($_GET['modification_acte']) && $_GET['modification_acte'] == "supprimer") { ?>
                    <form class="col-md-6 offset-md-3 p-3 bg-light" method="POST">
                        <fieldset>
                            <legend class="text-center mb-4">supprimer </legend>

                            <div class="form-group">
                                <label for="deleteacte">liste des actes disponible</label>
                                <select class="form-control" name="deleteacte" id="deleteacte">
                                    <?php foreach ($affichageacte as $acte) { ?>
                                        <option value="<?= $acte['id'] ?>"><?= $acte['nom'] . " au prix de " . $acte['prix'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" name="deleteact" value="deleteact" type="submit">Supprimer</button>
                            </div>
                        </fieldset>
                    </form>
                <?php } ?>

                <?php if (isset($_GET['modification_acte']) && $_GET['modification_acte'] == "modifier") { ?>
                    <form class="col-md-6 offset-md-3 p-3 bg-light" method="POST">
                        <fieldset>
                            <legend class="text-center mb-4">Modifier </legend>

                            <div class="form-group">
                                <label for="selecteacte">liste des actes a modifier</label>
                                <select class="form-control" name="selecteacte" id="selecteacte">
                                    <?php foreach ($affichageacte as $acte) { ?>
                                        <option value="<?= $acte['id'] ?>"><?= $acte['nom'] . " au prix de " . $acte['prix'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="updateacte">Type d'acte</label>
                                <input class="form-control" type="text" id="updateacte" name="updateacte" value="" required>


                                <label for="updatemontant">montant de l'acte </label>
                                <input class="form-control" type="text" id="updatemontant" name="updatemontant" value="" required>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" name="deleteact" value="updateacte" type="submit">Modifier</button>
                            </div>
                        </fieldset>
                    </form>
                <?php } ?>
            </div>

 <!-- ajouter supprimer modifier consigne  -->
 <div class="tab-pane container fade" id="ajouteconsigne">

<form class="col-md-6 offset-md-3 p-3 bg-light" method="GET">
    <fieldset>
        <legend class="text-center mb-4">action modification de consignes</legend>

        <div class="form-group">
            <label for="modification_consigne">quelle action souhaitez vous faire :</label>
            <select class="form-control" name="modification_consigne" id="modification_consigne">
                <option value="ajouter">ajouter</option>
                <option value="supprimer">supprimer</option>
                <option value="modifier">modifier</option>
            </select>
        </div>
        <div class="text-center">
            <button class="btn btn-primary" name="" value="" type="submit">choisir</button>
        </div>
    </fieldset>
</form>
<?php if (isset($_GET['modification_consigne']) && $_GET['modification_consigne'] == "ajouter") { ?>

    <form class="col-md-6 offset-md-3 p-3 bg-light" method="POST">
        <fieldset>
            <legend class="text-center mb-4">Ajouter un acte </legend>

            <div class="form-group">
                <label for="ajoutconsigne">consigne</label>
                <input class="form-control" type="text" id="ajoutconsigne" name="ajoutconsigne" value="" required>
            </div>
            <div class="form-group">
                                <label for="selecteconsultation">type de consultation</label>
                                <select class="form-control" name="selecteconsultation" id="selecteconsultation">
                                    <?php foreach ($affichageacte as $acte) { ?>
                                        <option value="<?= $acte['id'] ?>"><?= $acte['nom']  ?></option>
                                    <?php } ?>
                                </select>
                            </div>
            <div class="text-center">
                <button class="btn btn-primary" name="addconsigne" value="addconsigne" type="submit">ajouter</button>
            </div>
        </fieldset>
    </form>
<?php } ?>


<?php if (isset($_GET['modification_consigne']) && $_GET['modification_consigne'] == "supprimer") { ?>
    <form class="col-md-6 offset-md-3 p-3 bg-light" method="POST">
        <fieldset>
            <legend class="text-center mb-4">supprimer </legend>

            <div class="form-group">
                <label for="deleteconsigne">liste des actes disponible</label>
                <select class="form-control" name="iddeleteconsigne" id="iddeleteconsigne">
                    <?php foreach ($affichageconsigne as $consigne) { ?>
                        <option value="<?= $consigne['id'] ?>"><?= $consigne['acte_id'] . " au prix de " . $consigne['consigne'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" name="deleteconsigne" value="deleteconsigne" type="submit">Supprimer</button>
            </div>
        </fieldset>
    </form>
<?php } ?>

<?php if (isset($_GET['modification_consigne']) && $_GET['modification_consigne'] == "modifier") { ?>
    <form class="col-md-6 offset-md-3 p-3 bg-light" method="POST">
        <fieldset>
            <legend class="text-center mb-4">Modifier </legend>

            <div class="form-group">
                <label for="idupdateconsigne">liste des actes a modifier</label>
                <select class="form-control" name="idupdateconsigne" id="idupdateconsigne">
                    <?php foreach ($affichageconsigne as $consigne) { ?>
                        <option value="<?= $consigne['id'] ?>"><?= $consigne['acte_id'] . " au prix de " . $consigne['consigne'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="updatenewconsigne">consigne</label>
                <input class="form-control" type="text" id="updatenewconsigne" name="updatenewconsigne" value="" required>


              
            </div>
            <div class="form-group">
                                <label for="selecteconsultation">type de consultation</label>
                                <select class="form-control" name="selecteconsultation" id="selecteconsultation">
                                    <?php foreach ($affichageacte as $acte) { ?>
                                        <option value="<?= $acte['id'] ?>"><?= $acte['nom']  ?></option>
                                    <?php } ?>
                                </select>
                            </div>
            <div class="text-center">
                <button class="btn btn-primary" name="updateconsigne" value="updateconsigne" type="submit">Modifier</button>
            </div>
        </fieldset>
    </form>
<?php } ?>
</div>


 <!-- ajouter supprimer modifier pieces a fournir   -->
 <div class="tab-pane container fade" id="ajoutepieceafournir">

<form class="col-md-6 offset-md-3 p-3 bg-light" method="GET">
    <fieldset>
        <legend class="text-center mb-4">action modification de consignes</legend>

        <div class="form-group">
            <label for="ajoutepieceafournir">quelle action souhaitez vous faire :</label>
            <select class="form-control" name="ajoutepieceafournir" id="ajoutepieceafournir">
                <option value="ajouter">ajouter</option>
                <option value="supprimer">supprimer</option>
                <option value="modifier">modifier</option>
            </select>
        </div>
        <div class="text-center">
            <button class="btn btn-primary" name="" value="" type="submit">choisir</button>
        </div>
    </fieldset>
</form>
<?php if (isset($_GET['ajoutepieceafournir']) && $_GET['ajoutepieceafournir'] == "ajouter") { ?>

    <form class="col-md-6 offset-md-3 p-3 bg-light" method="POST">
        <fieldset>
            <legend class="text-center mb-4">Ajouter une piece a fournir  </legend>

            <div class="form-group">
                <label for="ajoutpiecefournir">pieces a fournir </label>
                <input class="form-control" type="text" id="ajoutpiecefournir" name="ajoutpiecefournir" value="" required>
            </div>
            <div class="form-group">
                                <label for="selectacte">type d'acte</label>
                                <select class="form-control" name="selectacte" id="selectacte">
                                    <?php foreach ($affichageacte as $acte) { ?>
                                        <option value="<?= $acte['id'] ?>"><?= $acte['nom']  ?></option>
                                    <?php } ?>
                                </select>
                            </div>
            <div class="text-center">
                <button class="btn btn-primary" name="addpiecefournir" value="addpiecefournir" type="submit">ajouter</button>
            </div>
        </fieldset>
    </form>
<?php } ?>


<?php if (isset($_GET['ajoutepieceafournir']) && $_GET['ajoutepieceafournir'] == "supprimer") { ?>
    <form class="col-md-6 offset-md-3 p-3 bg-light" method="POST">
        <fieldset>
            <legend class="text-center mb-4">supprimer </legend>

            <div class="form-group">
                <label for="iddeletepiece">liste des pieces a fournir disponible</label>
                <select class="form-control" name="iddeletepiece" id="iddeletepiece">
                    <?php foreach ($affichagepiecesafournir as $pieces) { ?>
                        <option value="<?= $pieces['id'] ?>"><?=$pieces['piece'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" name="deletepiece" value="deletepiece" type="submit">Supprimer</button>
            </div>
        </fieldset>
    </form>
<?php } ?>

<?php if (isset($_GET['ajoutepieceafournir']) && $_GET['ajoutepieceafournir'] == "modifier") { ?>
    <form class="col-md-6 offset-md-3 p-3 bg-light" method="POST">
        <fieldset>
            <legend class="text-center mb-4">Modifier </legend>

            <div class="form-group">
                <label for="idupdateconsigne">liste des pieces a fournir a modifier</label>
                <select class="form-control" name="idupdateconsigne" id="idupdateconsigne">
                    <?php foreach ($affichagepiecesafournir as $pieces) { ?>
                        <option value="<?= $pieces['id'] ?>"><?=$pieces['piece'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="updatenewconsigne">consigne</label>
                <input class="form-control" type="text" id="updatenewconsigne" name="updatenewconsigne" value="" required>


              
            </div>
            <div class="form-group">
                                <label for="updateidacte">type de consultation</label>
                                <select class="form-control" name="updateidacte" id="updateidacte">
                                    <?php foreach ($affichageacte as $acte) { ?>
                                        <option value="<?= $acte['id'] ?>"><?= $acte['nom']  ?></option>
                                    <?php } ?>
                                </select>
                            </div>
            <div class="text-center">
                <button class="btn btn-primary" name="updatepiece" value="updatepiece" type="submit">Modifier</button>
            </div>
        </fieldset>
    </form>
<?php } ?>
</div>

            
            <div class="tab-pane container fade" id="menu2">...</div>
            <div class="tab-pane container fade" id="menu2">...</div>
            <div class="tab-pane container fade" id="menu2">...</div>
        </div>
    </div>

</body>

</html>