<style>
    h1{
        text-align: center;
    }
</style>
<div class="container-fluid">
<ul class="nav nav-tabs">

  <li class="nav-item">
    <a class="nav-link" href="?rdventre2date=show">nombre de rdv entre deux dates</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?patientstotal=show">nombre de patients total</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?soldeinferieur=show">nombre de patientsayant un solde inférieur à une somme X</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="?patienttotaldate=show">solde total de tous lespatients à une date précise</a>
  </li>
</ul>
</div>


<?php if (isset($nbrpatientsoldeinfieur)) { } ?>
<?php if(isset($_GET["rdventre2date"]) && $_GET["rdventre2date"]=="show"){?>
    <form method="POST">
  <div class="form-group" >
    <label for="datedebut">Date de début :</label>
    <input type="date" class="form-control" id="datedebut" name="datedebut" >
  </div>
  <div class="form-group">
    <label for="datefin">Date de fin :</label>
    <input type="date" class="form-control" id="datefin" name="datefin">
  </div>
  <button type="submit" class="btn btn-primary"name="rdventre2dates">Rechercher</button>
</form>


<?php  if (isset($rdventre2dates)){ ?>
<div class="container mt-3">
  <h2>la liste des rdv</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>id_patient</th>
        <th>medecin_id</th>
        <th>acte_id</th>
        <th>date_heure</th>
        <th>motif</th>
        <th>consignes</th>
        <th>compte rendu</th>
        <th>prix</th>
        <th>statut</th>
      </tr>
    </thead>
    <tbody>
   <?php  foreach ($rdventre2dates as $datesrdv){ ?>


      <tr>
        <td><?= $datesrdv['patient_id'] ?></td>
        <td><?= $datesrdv['medecin_id'] ?></td>
        <td><?= $datesrdv['acte_id'] ?></td>
        <td><?= $datesrdv['date_heure'] ?></td>
        <td><?= $datesrdv['motif'] ?></td>
        <td><?= $datesrdv['consignes'] ?></td>
        <td><?= $datesrdv['compte_rendu'] ?></td>
        <td><?= $datesrdv['prix'] ?></td>
        <td><?= $datesrdv['statut'] ?></td>

      </tr>

      

<?php  }
 ?>
    </tbody>
  </table>
</div>
 <?php } }?>


<?php if(isset($_GET["patientstotal"]) && $_GET["patientstotal"]=="show"){?>
<div class="container-fluid d-flex justify-content-center mt-5">
    <div class="card" style="width:400px">
  <img class="card-img-top" src="assets/img/collaborationpatient.jpg" alt="Card image">
  <div class="card-body">
    <h4 class="card-title text-center">il y a actuellement </h4>
    <p class="card-text text-center"><?= $affichagenbrpatient["0"]["nbr"] ?> patient </p>
    <p class="text-center">dans notre clinique</p>
  </div>
</div>
</div>

<?php }?>


<?php if(isset($_GET["soldeinferieur"]) && $_GET["soldeinferieur"]=="show"){?>
    <div class="container">
  <form method="POST">
    <div class="row mt-5">
      <div class="col-8 d-flex align-items-center justify-content-center">
        <label for="montantsoldeinferieur" class="me-2">liste des patients ayant une solde inférieure à :</label>
        <input type="text" class="form-control me-2" id="montantsoldeinferieur" name="montantsoldeinferieur">
        <button type="submit" class="btn btn-primary" name="soldeinferieur">Rechercher</button>
      </div>
    </div>
  </form>
</div>

<?php if(isset($_POST['montantsoldeinferieur'])){ ?>

 
    <div class="container-fluid d-flex justify-content-center mt-5">
    <div class="card" style="width:400px">
  <img class="card-img-top" src="assets/img/soldepatient.jpg" alt="Card image">
  <div class="card-body">
    <h4 class="card-title text-center">il y a actuellement </h4>
    <p class="card-text text-center"><?= $nbrpatientsoldeinfieur["0"]["nombre_de_lignes"] ?> patient </p>
    <p class="text-center">qui on un solde inferieur a <?= $_POST["montantsoldeinferieur"] ?> euros</p>
  </div>
</div>
</div>
<?php } }?>


<?php if(isset($_GET["patienttotaldate"]) && $_GET["patienttotaldate"]=="show"){?>

<?php }?>