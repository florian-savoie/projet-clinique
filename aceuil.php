<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clinique</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        header {

            border-radius: 2rem;

            height: 40vh;
            background-image: url(building.jpg);
            background-size: cover;
            background-position: center;
        }

        .imgconnexion {
            height: 28rem;
            width: 28rem;
            display: flex;
            margin: auto !important;
            /* centre horizontalement */
        }

        .presentationConneion {
            height: 40vh;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .formconnexion {
            position: absolute;
            top: 65%;
            left: 50%;
            transform: translate(-50%, -50%);

            text-align: center;
        }

        label {
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            display: block;
            width: 45%;
            float: left;
            padding: 1% 1% 1% 0%;
            text-align: center;
            letter-spacing: 1px;
        }

        label:not(.pas_de_style),
        input {
            border-radius: 3px;
        }

        label:hover {
            font-weight: bold;
        }

        .pas_de_style {
            background: none;
        }

        input {
            color: #414a51;
            padding: 1% 0% 1% 1%;
            font-size: 14px;
            margin-left: 1%;
            width: 48%;
            border: 1px solid #ccc;
            transition: all 0.25s linear;
        }

        input:focus {
            width: 39%;
            box-shadow: 0 0 5px #6495ED;
        }

        .bouton {
            float: middle;

        }

        .textConnection {
            color: #fff;
            border-radius: 1rem;
            background-color: rgba(0, 0, 0, 0.7);
            /* noir avec 50% d'opacité */
            font-size: 3rem;
            font-weight: 800;
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
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>

<div class="equipe">
    <div class="row my-5">
        <h1 class="text-center my-2">Nos Equipes</h1>
        <div class="col-3 cardTeam"><div class="card" style="width:400px;">
  <img class="card-img-top" src="directeur.jpg" alt="Card image"style="height: 15rem;">
  <div class="card-body">
    <h4 class="card-title">Notre directeur</h4>

  </div>
</div></div>
        <div class="col-3 cardTeam"><div class="card" style="width:400px;">
  <img class="card-img-top" src="patient.jpg" alt="Card image"style="height: 15rem;">
  <div class="card-body">
    <h4 class="card-title">Nos patient</h4>
    <p class="card-text">Nous comptont</p>
    <p>patient</a>
  </div>
</div></div>
        <div class="col-3 cardTeam"><div class="card" style="width:400px;">
  <img class="card-img-top" src="entretien.jpg" alt="Card image"style="height: 15rem;">
  <div class="card-body">
    <h4 class="card-title">Nos agent d'entretien</h4>
    <p class="card-text">Nous comptont</p>
    <p>agent d'entretien</p>
  </div>
</div></div>
<div class="col-3 cardTeam"><div class="card" style="width:400px;">
    <img class="card-img-top" src="medecin.jpg" alt="Card image"style="height: 15rem;">
    <div class="card-body">
      <h4 class="card-title">Nos medecins</h4>
      <p class="card-text">Nous comptont</p>
      <a href="#" class="btn btn-primary">medecins</a>
    </div>
  </div></div>
    </div>
</div>

    <div class="presentationConneion">
        <div class="row">
            <div class="col-4 contenuText">
                <h2>Anesthésie et réanimation</h2>

                <p>Le service d'anesthésie et réanimation propose à ses patients une offre personnalisée de soins humains, de qualité et innovants. Découvrez ci-dessous les informations essentielles sur le traitement, la consultation ou la prise de rendez-vous avec un anesthésiste-réanimateur de la Clinique Rhône Durance.</p>
                
                <h3>Anesthésie et réanimation : qu’est-ce que c’est ?</h3>
                
                <p>L’anesthésie-réanimation désigne une spécialité exercée au bloc opératoire (anesthésie) et/ou dans un service spécialisé (réanimation).</p>
                
                <p>Un service de réanimation accueille les patients hospitalisés présentant une défaillance d’au moins 2 fonctions vitales :</p>
                
                <ul>
                  <li>L’appareil respiratoire (les poumons),</li>
                  <li>L’appareil circulatoire (cœur et vaisseaux),</li>
                  <li>La fonction rénale,</li>
                  <li>Le système nerveux…</li>
                </ul>
                
            </div>

                
            <div class="col-4 ">
                <img class="imgconnexion" src="connexion.jpg" alt="">

                <form method="POST" class="formconnexion">

                    <fieldset>
                        <legend class="textConnection mb-4">Connexion</legend>
                        <p class="">
                            <label for="Identifiant">nom</label>
                            <input type="text" name="Identifiant" required>
                        </p>
                        <p>
                            <label for="password">Mots de passe</label>
                            <input type="text" name="password" required>
                        </p>

                        <button type="reset" class="btn btn-secondary bouton">REINITIALISER</button>
                        <button type="submit" class="btn btn-secondary bouton">Connexion</button>


                    </fieldset>
                </form>


            </div>
            <div class="col-4 contenuText">
                <h2>Quand consulter un dermatologue ?</h2>

                <p>Dès que la peau prend un aspect inhabituel – apparition d’une protubérance, de rougeurs ou de démangeaisons, augmentation de la taille d’un grain de beauté, perte de cheveux… – il est conseillé de consulter son médecin traitant qui, s’il le juge utile, vous réorientera vers un médecin dermatologue.</p>
                
                <p>En cas d’antécédents de maladies de peau, personnels ou familiaux, ou d’exposition à des facteurs de risque (exposition importante au soleil, à des produits chimiques, à un milieu humide…), il peut être utile d’être suivi régulièrement par un dermatologue. Acné, eczéma, psoriasis, verrue, herpès, zona, kyste cutané, hyperpigmentation, mélanome… : les pathologies de la peau, des plus bénignes aux plus graves, sont prises en charge dans les services de dermatologie des cliniques Elsan.</p>
                
                <h3>Que fait le dermatologue ?</h3>
                
                <p>Le dermatologue interroge le patient sur la nature du problème, sur ses antécédents médicaux et familiaux et son hygiène de vie. Il procède à l’auscultation de la zone touchée par le problème (lésion, grain de beauté…) mais aussi d’autres zones où il peut être présent sans être encore visible. Il peut réaliser une dermoscopie, examen indolore, pour visualiser la peau en profondeur, ou une biopsie cutanée pour préciser la nature du problème.</p>
                
            </div>
        </div>

    </div>



</body>

</html>