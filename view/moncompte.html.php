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
        .container {
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}
img{
    height: 15rem;
    width: 15rem;
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
  <!-- Contenu du conteneur ici -->
  <div> <img
  <?php if($_SESSION["role"] == "directeur") { echo "src='assets/img/navdirecteur.png'";}
  elseif ( $_SESSION["role"] == "medecins") { echo "src='assets/img/navdocteur.png'";}  
  elseif ( $_SESSION["role"] == "patients") { echo 'src="assets/img/navclient.png"';} 
  elseif ( $_SESSION["role"] == "agents") { echo 'src="assets/img/navagent.png"';}  ?>
   
   
   alt="" ></div>
  <h1>Bienvenu <?=$_SESSION["nom"]." ".$_SESSION["prenom"]  ?></h1>
  <h2>role : <?=$_SESSION["role"] ?></h2>
</div>

</body>
</html>