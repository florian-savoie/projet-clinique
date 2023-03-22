<style>
.imglogorole{
    border-radius: 50%;
    height: 5rem;
    width: 5rem;
}
</style>
<?php if(!isset($_SESSION['connecter'])) {
    ?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Veuillez vous connecter pour acceder a vos données</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<?php }
    else if ($_SESSION['connecter'] && $_SESSION['role'] == "medecins") 
    {  ?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="#"><img class="imglogorole" src="assets/img/navdocteur.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">medecins</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">medecins</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="deconnexion.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php }
    else if ($_SESSION['connecter'] && $_SESSION['role'] == "patients") 
    {  ?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="#"><img class="imglogorole" src="assets/img/navclient.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">client</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">client</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="deconnexion.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php }
    else if ($_SESSION['connecter'] && $_SESSION['role'] == "agents") 
    {  ?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="#"><img class="imglogorole" src="assets/img/navagent.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="agents.php">Mise a jour client</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">agents</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="deconnexion.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php }     else if ($_SESSION['connecter'] && $_SESSION['role'] == "directeur") 
    {  ?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img class="imglogorole" src="assets/img/navdirecteur.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="directeur.php">modification personnel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">modification client</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">modification documents</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Statistique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="moncompte.php">mon compte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="deconnexion.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php }?>