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
                <a class="nav-link " href="?modifInfos=show">Modifier informations patient</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?synthesepatient=show">synthèse patient</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?Payemment=show">Payemment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="?rendezvous=show">Les rendez-vous</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="?searchclient=show">Rechercher un patient</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="?rechargesolde=show">recharger solde patient</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="?soldepatient2date=show">solde d'un patient entre 2 dates </a>
            </li>

        </ul>


        <?php
        if (isset($_GET['modifInfos']) && $_GET['modifInfos'] === 'show') {
        ?>
            <!-- Formulaire de recherche -->
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form method="POST" action="">
                            <div class="input-group">
                                <input type="text" value="modifier les information d'un patient :" class="form-control" name="search" id="search" required>
                                <button type="submit" class="btn btn-primary" value="recherchepatient" name="recherchepatient">Rechercher</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Formulaire de modification -->
            <?php if (!empty($patient)) : ?>
                <div class="container my-5">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <h2>Modifier les informations de <?php echo $patient['nom'] . ' ' . $patient['prenom']; ?></h2>
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="adresse">Adresse :</label>
                                    <input type="text" class="form-control" name="adresse" id="adresse" value="<?php echo $patient['adresse']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tel">Numéro de téléphone :</label>
                                    <input type="text" class="form-control" name="tel" id="tel" value="<?php echo $patient['tel']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Adresse email :</label>
                                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $patient['email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="profession">Profession :</label>
                                    <input type="text" class="form-control" name="profession" id="profession" value="<?php echo $patient['profession']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="situation_familiale">Situation familiale :</label>
                                    <select class="form-control" name="situationFamiliale" id="situationFamiliale">
                                        <option value="celibataire" <?php echo ($patient['situation_familiale'] == 'celibataire') ? 'selected' : ''; ?>>Célibataire</option>
                                        <option value="marié" <?php echo ($patient['situation_familiale'] == 'marié') ? 'selected' : ''; ?>>Marié</option>
                                        <option value="divorce" <?php echo ($patient['situation_familiale'] == 'divorce') ? 'selected' : ''; ?>>Divorcé</option>
                                        <option value="veuf" <?php echo ($patient['situation_familiale'] == 'veuf') ? 'selected' : ''; ?>>Veuf</option>
                                    </select>
                                </div>
                                <button type="submit" value="updateInfosClient" name="updateInfosClient" class="btn btn-primary">Enregistrer les modifications</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        <?php
        }
        ?>
        <?php
        if (isset($_GET['synthesepatient']) && $_GET['synthesepatient'] === 'show') {
        ?>
            <!-- Formulaire de synthese patient -->
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form method="POST" action="">
                            <div class="input-group">
                                <input type="text" class="form-control" name="nsspatien" id="nsspatien" value=" numéro de sécurité sociale (NSS)" required>
                                <button type="submit" class="btn btn-primary" value="synthesepatient" name="synthesepatient">synthèse patient</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Formulaire  -->
            <?php if (!empty($patientNss)) : ?>
                <div class="container mt-3">
                    <h2>Information du patient </h2>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>prenom</th>
                                <th>adrese</th>
                                <th>numero de tel</th>
                                <th>adresse email</th>
                                <th>profession</th>
                                <th>situation familliale</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $patientNss['nom'] ?></td>
                                <td><?= $patientNss['prenom'] ?></td>
                                <td><?= $patientNss['adresse'] ?></td>
                                <td><?= $patientNss['tel'] ?></td>
                                <td><?= $patientNss['email'] ?></td>
                                <td><?= $patientNss['profession'] ?></td>
                                <td><?= $patientNss['situation_familiale'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <h2>Historique du patient </h2>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>nom du medecin</th>
                                <th>numero de l'acte</th>
                                <th>date et heure</th>
                                <th>motif</th>
                                <th>pieces a fournir</th>
                                <th>consignes</th>
                                <th>suivi</th>
                                <th>compte rendu </th>
                                <th>prix</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <?php foreach ($historique as $rdv) : ?>
                            <tr>
                                <td style="font-size:0.8rem;"><?= $patientNss['nom'] ?></td>
                                <td style="font-size:0.8rem;"><?= $rdv['medecin_id'] ?></td>
                                <td style="font-size:0.8rem;"><?= $rdv['acte_id'] ?></td>
                                <td style="font-size:0.8rem;"><?= $rdv['date_heure'] ?></td>
                                <td style="font-size:0.8rem;"><?= $rdv['motif'] ?></td>
                                <td style="font-size:0.8rem;"><?= $rdv['pieces_fournir'] ?></td>
                                <td style="font-size:0.8rem;"><?= $rdv['consignes'] ?></td>
                                <td style="font-size:0.8rem;"><?= $rdv['suivi'] ?></td>
                                <td style="font-size:0.8rem;"><?= $rdv['compte_rendu'] ?></td>
                                <td style="font-size:0.8rem;"><?= $rdv['prix'] ?></td>
                                <td style="font-size:0.8rem;"><?= $rdv['statut'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

            <?php endif; ?>

        <?php
        }
        ?>

        <?php
        if (isset($_GET['Payemment']) && $_GET['Payemment'] === 'show') {
        ?>
            <!-- Formulaire de synthese patient -->
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form method="POST" action="">
                            <div class="input-group">
                                <input type="text" class="form-control" name="searchpaiement" id="searchpaiement" value=" nom du patient" required>
                                <button type="submit" class="btn btn-primary" value="recherchepatientPayemment" name="recherchepatientPayemment">nom du patien</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Formulaire  -->

            <?php
            if (isset($alertpaiement)) { ?>
                <h1><?= $alertpaiement ?></h1>
            <?php  }

            if (!empty($patientpaiments)) : ?>
                <div class="container mt-3">
                    <h2>Information du patient </h2>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>prenom</th>
                                <th>adrese</th>
                                <th>numero de tel</th>
                                <th>adresse email</th>
                                <th>profession</th>
                                <th>situation familliale</th>
                                <th>Solde</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $patientpaiments['nom'] ?></td>
                                <td><?= $patientpaiments['prenom'] ?></td>
                                <td><?= $patientpaiments['adresse'] ?></td>
                                <td><?= $patientpaiments['tel'] ?></td>
                                <td><?= $patientpaiments['email'] ?></td>
                                <td><?= $patientpaiments['profession'] ?></td>
                                <td><?= $patientpaiments['situation_familiale'] ?></td>
                                <td><?= $patientpaiments['solde'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <h2>Historique du patient </h2>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>nom du medecin</th>
                                <th>numero de l'acte</th>
                                <th>date et heure</th>
                                <th>motif</th>
                                <th>pieces a fournir</th>
                                <th>consignes</th>
                                <th>suivi</th>
                                <th>compte rendu </th>
                                <th>prix</th>
                                <th>status</th>
                                <th> payé</th>
                            </tr>
                        </thead>
                        <?php foreach ($historiquepaiments as $rdv) : ?>
                            <tr>
                                <td style="font-size:0.75rem;"><?= $patientpaiments['nom'] ?></td>
                                <td style="font-size:0.75rem;"><?= $rdv['medecin_id'] ?></td>
                                <td style="font-size:0.75rem;"><?= $rdv['acte_id'] ?></td>
                                <td style="font-size:0.75rem;"><?= $rdv['date_heure'] ?></td>
                                <td style="font-size:0.75rem;"><?= $rdv['motif'] ?></td>
                                <td style="font-size:0.75rem;"><?= $rdv['pieces_fournir'] ?></td>
                                <td style="font-size:0.75rem;"><?= $rdv['consignes'] ?></td>
                                <td style="font-size:0.75rem;"><?= $rdv['suivi'] ?></td>
                                <td style="font-size:0.75rem;"><?= $rdv['compte_rendu'] ?></td>
                                <td style="font-size:0.75rem;"><?= $rdv['prix'] ?></td>
                                <td style="font-size:0.75rem;"><?= $rdv['statut'] ?></td>
                                <?php if ($rdv['statut'] != "paye") { ?>
                                    <td>
                                        <form method="POST" action="">
                                            <input type="hidden" name="searchpaiement" value="<?= $patientpaiments['nom'] ?>">
                                            <input type="hidden" name="soldeclient" value="<?= $patientpaiments['solde'] ?>">
                                            <input type="hidden" name="id_patient" value="<?= $patientpaiments['id_patient'] ?>">
                                            <input type="hidden" name="prixpaiement" value="<?= $rdv['prix'] ?>">
                                            <a href="?Payemment=show"><button type="submit" class="btn btn-success" value="<?= $rdv['id'] ?>" name="statuspayer" 75style="font-size:0.7rem;">payer</button></a>
                                        </form>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

            <?php endif; ?>

        <?php
        }
        ?>
        <?php
        if (isset($_GET['rendezvous']) && $_GET['rendezvous'] === 'show') {
        ?>
            <!-- Formulaire de synthese patient -->
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form method="POST" action="">
                            <div class="input-group">
                                <input type="text" class="form-control" name="sheachmedecin" id="sheachmedecin" value="Nom du medecin" required>
                                <select class="form-control" name="categoryrdv" id="categoryrdv">

                                    <option value="" disabled selected>Type de rendez-vous</option>
                                    <?php foreach ($medecin as $cat) { ?> <option value="<?= $cat["specialite"] ?>"><?= $cat["specialite"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <select class="form-control" name="semainechoisie" id="semainechoisie">

                                <option value="" disabled selected>choix de la semaine </option>
                                <?php for ($i = 1; $i < 52; $i++) { ?> <option value="<?= $i ?>">semaine <?= $i ?></option>
                                <?php } ?>
                            </select>
                            <button type="submit" class="btn btn-primary" value="shearchplanningmedecin" name="shearchplanningmedecin">Regarder les disponibilités</button>

                        </form>
                    </div>
                </div>
            </div>


            <?php


            if (isset($tableaurdv)) {

                $datedebut = $tableaurdv['date'];

                $timestamp = strtotime($datedebut);
                $timestampjour = 86400;
                $timestampdemisjournée = 43200;
                $timestampsemaine = $timestampjour * 7;
                $timestamprdv = [];


                foreach ($tableaurdv['resultat'] as $rdv) {
                    $rdv_timestamp = strtotime($rdv['date_heure']);
                    array_push($timestamprdv, $rdv_timestamp);
                }

                $timestampdelasemaine = [];
                for ($e = $timestamp; $e < $timestamp + $timestampsemaine; $e += $timestampdemisjournée) {
                    array_push($timestampdelasemaine, $e);
                }

                foreach ($timestamprdv as $verifrdv) {
                    $index = 0;
                    foreach ($timestampdelasemaine as $agendasemaine) {
                        if ($verifrdv >= $agendasemaine && $verifrdv < $agendasemaine + $timestampdemisjournée) {
                            $timestampdelasemaine[$index] = 'rdv';
                            $index++;
                        } else {
                            $index++;
                        }
                    }
                }

                $tableaujour = [
                    "lundi",
                    "mardi",
                    "mercredi",
                    "jeudi",
                    "vendredi",
                    "samedi",
                    "dimanche"
                ];


            ?>

                <div class="container mt-3">
                    <h2></h2>
                    <p>voici les dates disponible pour la semaine <?= $_POST['semainechoisie'] ?></p>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <?php for ($i = 0; $i < 7; $i++) {
                                    $timestamp = strtotime($datedebut . " +" . $i . " day");
                                    $date = date("Y/m/d", $timestamp);
                                    $jour = date("l", $timestamp);
                                    echo "<th>" . $date . "<br>" . $tableaujour[$i] . "</th>";
                                } ?>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php for ($m = 0; $m < 14; $m += 2) {
                                    if ($timestampdelasemaine[$m] == "rdv") { ?>
                                        <td><button type="button" class="btn btn-danger">indisponible</button></td>
                                    <?php  } else { ?>
                                        <td>
                                            <form action="agents.php?" method="get">
                                                <input type="hidden" name="priserdv" value="show">
                                                <input type="hidden" name="timestamp" value="<?= $timestampdelasemaine[$m] ?>">
                                                <input type="hidden" name="docteurname" value="<?= $docteurname ?>">
                                                <input type="hidden" name="category" value="<?= $categorydocteur ?>">
                                                <button type="submit" class="btn btn-success">disponible</button>
                                            </form>
                                        </td>
                                <?php  }
                                } ?>
                            </tr>
                            <tr>
                                <?php for ($a = 1; $a < 15; $a += 2) {
                                    if ($timestampdelasemaine[$a] == "rdv") { ?>
                                        <td><button type="button" class="btn btn-danger">indisponible</button></td>
                                    <?php  } else { ?>
                                        <td>
                                            <form action="agents.php?" method="get">
                                                <input type="hidden" name="priserdv" value="show">
                                                <input type="hidden" name="timestamp" value="<?= $timestampdelasemaine[$a] ?>">
                                                <input type="hidden" name="docteurname" value="<?= $docteurname ?>">
                                                <input type="hidden" name="category" value="<?= $categorydocteur ?>">
                                                <button type="submit" class="btn btn-success">disponible</button>
                                            </form>
                                        </td>
                                <?php  }
                                } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>

        <?php   }
        }
        ?>
        <!-- rechercher  nss grace au nom client et date de naissance  -->

        <?php
        if (isset($_GET['searchclient']) && $_GET['searchclient'] === 'show') {
        ?>
            <!-- Formulaire de -->
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form method="POST" action="">
                            <div class="input-group">
                                <input type="text" class="form-control" name="nomPatient" id="nomPatient" placeholder="Nom du patient" required>
                                <input type="date" class="form-control" name="dateNaissance" id="dateNaissance" required>
                                <button type="submit" class="btn btn-primary" value="rechercherNSS" name="rechercherNSS">Rechercher NSS</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
            if (isset($patientnss)) {
                echo "le numero NSS du client est " . $patientnss[0]['nss'];
            }
        }
        ?>

        <!-- recharger solde du client grace au nss -->
        <?php
        if (isset($_GET['rechargesolde']) && $_GET['rechargesolde'] === 'show') {
        ?>
            <!-- Formulaire de  -->
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form method="POST" action="">
                            <div class="input-group">
                                <input type="text" class="form-control" name="nsspatient" id="nsspatient" placeholder="NSS du patient" required>
                                <input type="number" class="form-control" name="montantrecharge" id="montantrecharge" value="0" required>
                                <button type="submit" class="btn btn-primary" value="rechargesolde" name="rechargesolde">Recharger solde </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- solde d'un patient entre deux avec historique  -->
        <?php
        if (isset($_GET['soldepatient2date']) && $_GET['soldepatient2date'] === 'show') {
        ?>
            <!-- Formulaire de  -->
            <div class="container">
                <h2>Sélection de dates</h2>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="numeronss">Numero nss :</label>
                        <input type="text" class="form-control" id="numeronss" name="numeronss">
                        <label for="dateDebut">Date de début :</label>
                        <input type="date" class="form-control" id="soldedateDebut" name="soldedateDebut">

                        <label for="dateFin">Date de fin :</label>
                        <input type="date" class="form-control" id="soldedateFin" name="soldedateFin">
                    </div>
                    <button type="submit" class="btn btn-primary" name="soldepatient2date">Rechercher</button>
                </form>
            </div>

            <?php if (isset($resultat)) { ?>

                <div class="container mt-3">
                    <h2>liste de l'historique</h2>
                    <p>du <?= $_POST["soldedateDebut"] ?> au <?= $_POST["soldedateFin"] ?></p>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>date </th>
                                <th>montant</th>
                                <th>type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultat as $result) { ?>
                                <tr>
                                    <td><?= $result["date_heure"] ?></td>
                                    <td><?= $result["montant"] ?></td>
                                    <td><?= $result["type"] ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

        <?php }
        } ?>


        <!-- enregistrer un patient  dans le planning d'un docteur   -->
        <?php
        if (isset($_GET['priserdv']) && $_GET['priserdv'] === 'show') { 
        ?>

            <!-- Formulaire de  -->
            <div class="container">
                <h4>vous souhaiter prendre rendez vous le avec monsieur pour une consultation de type </h4>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="numeronss">Numero nss du patient :</label>
                        <input type="text" class="form-control" id="numeronss" name="numeronss">
                        <label for="nomdocteur">nom du docteur :</label>

                        <select class="form-control" name="nomdocteur" id="nomdocteur">

                            <option value="<?= $_GET['docteurname'] ?>" ><?= $_GET['docteurname'] ?></option>

                        </select>

                        <label for="motif">motif de consultation :</label>

                        <select class="form-control" name="motif" id="motif">

                            <option value="<?= $_GET['category'] ?>" ><?= $_GET['category'] ?></option>

                        </select>
                        <label for="typeconsultation">type de consultation :</label>

                        <select class="form-control" name="typeconsultation" id="typeconsultation">
                        <?php   foreach ( $typeacte as $acte) { ?>
                            <option value="<?= $acte["nom"] ?>" > <?= $acte["nom"]. " aux prix de ".$acte["prix"]." euros" ?></option>
                         <?php  } ?>
                         </select>
                        <button type="submit" class="btn btn-primary" name="priserdv">enregistrer rendez-vous</button>
                </form>
            </div>

        <?php 
        } ?>

    </div>

</body>

</html>