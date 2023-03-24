<style>
    h1{
        text-align: center;
    }
</style>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="?annuaire=show">Annuaire des medecins</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="#">Disabled</a>
  </li>
</ul>
<?php 
if (isset($_GET['annuaire']) && isset($_GET['annuaire']) == "show") { ?>

<div class="container mt-3">
<h1>Annuaire des medecins</h1>         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>id_medecin</th>
        <th>nom</th>
        <th>preom</th>
        <th>specialitées</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($affichageannuaire as $annuaire){ ?>
      <tr>
        <td><?= $annuaire['id_medecin']?></td>
        <td><?= $annuaire['nom']?></td>
        <td><?= $annuaire['prenom']?></td>
        <td><?= $annuaire['specialite']?></td>
      </tr>
<?php } ?>
    </tbody>
  </table>
</div>  


  <?php   } ?>