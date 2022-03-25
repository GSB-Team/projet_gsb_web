<?php
$est=!estConnecte();
?>
  <!-- Navbar
    ================================================== -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a href="./indexzz.php">Accueil</a>
              </li>

               

               <!-- <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Matériel <b class="caret"></b></a>
                  <ul class="dropdown-menu">                
                 <li><a href="listerMateriel.php">Lister Materiel</a></li>
                      <li><a href="ajouterMateriel.php">Ajouter Materiel</a></li>
                      <li><a href="rechercherMateriel.php">Rechercher Materiel</a></li>
                      <li><a href="supprimerMateriel.php">Supprimer Materiel</a></li>
                      <li><a href="modifierMateriel.php">ModifierMateriel</a></li>           
                  </ul>
              </li>-->

<?php

if (estAdministrateurConnecte())
{

  ?>
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Visiteur<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="lister.php">Lister Visiteur</a></li>
                      <li><a href="ajouterVisi.php">Ajouter Visiteur</a></li>
                      <li><a href="rechercher.php">Rechercher Visiteur</a></li>
                      <li><a href="modifier.php">Modifier Visiteur</a></li>
                      <li><a href="supprimer.php">Supprimer Visiteur</a></li>
                  </ul>
               </li>
               <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Materiel<b class="caret"></b></a>
                   <ul class="dropdown-menu">
                      <li><a href="./listerMateriel.php">Lister Materiel</a></li>
                      <li><a href="./ajouterMateriel.php">Ajouter Materiel</a></li>
                      <li><a href="./rechercherMateriel.php">Rechercher Materiel</a></li>
                      <li><a href="./supprimerMateriel.php">Supprimer Materiel</a></li>
                      <li><a href="./modifierMateriel.php">ModifierMateriel</a></li>
                  </ul>
               </li>
               <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Emprunt<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="emprunter.php">Lister les Materiels Restituer</a></li>
                      <li><a href="RestituerPasMateriel.php">Lister les Materiels Non Restituer</a></li>
                      <li><a href="listerMaterielsDisponible.php">Lister matériel disponible</a></li>
                      <li><a href="AjouterEmprunter.php">Ajouter Emprunter</a></li>
                      <li><a href="AjouterRestituer.php">Ajouter Restituer</a></li>
                    <!-- <li><a href="emprunt.php">          Ajouter Emprunt</a></li> -->
                  </ul>
               </li>
               <li class="nav"><a href="deconnecter.php" >Se déconnecter</a></li>
               

              
 
  <?php
}
// Si session administrateur
if (estVisiteurConnecte())
{

  ?>

                <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Visiteur<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="lister.php">Lister Visiteur</a></li>
                      <li><a href="rechercher.php">Rechercher Visiteur</a></li>
                  </ul>
               </li>
               <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Materiel<b class="caret"></b></a>
                   <ul class="dropdown-menu">
                      <li><a href="./listerMateriel.php">Lister Materiel</a></li>
                      <li><a href="./rechercherMateriel.php">Rechercher Materiel</a></li>
                  </ul>
               </li>

            <li class="nav"><a href="deconnecter.php" >Se déconnecter</a></li>
 
  <?php
}
// Si aucune connection n'est en cours, proposer l'inscription et l'identification
if (!estConnecte())
{
?>


              <li class="nav">
                 <a href="connecter.php" >Se connecter</a> 
              </li>
              <li class="nav">
                <a href="Inscription.php">Inscription</a>
              </li>   
<?php
}              
                                         
?>
               
              
               
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>


<!-- <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="./indexzz.php">Accueil</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a href="./indexzz.php">Accueil</a>
              </li>
              
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Lister  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  <li><a href="lister.php">Lister Visiteur</a></li>
                      <li><a href="listerMateriel.php">Lister Materiel</a></li>
                      <li><a href="emprunter.php">Lister les Materiels Restituer</a></li>
                      <li><a href="RestituerPasMateriel.php">Lister les Materiels Non Restituer</a></li>
                      <li><a href="listerMaterielsDisponible.php">Lister matériel disponible</a></li>
                      
                  </ul>
              </li>
                                         
              <li class="nav">
                <a href="lister.php?categ=bul">Bulbes</a>
              </li>
              <li class="nav">
                <a href="lister.php?categ=ros">Rosiers</a>
              </li>
              <li class="nav">
                <a href="lister.php?categ=mas">Massifs</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>-->


  <!-- Navbar
    ================================================== -->
   <!-- <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="./indexzz.php">Accueil</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a href="./indexzz.php">Accueil</a>
              </li>
          
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Lister  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="lister.php">Lister Visiteur</a></li>
                      <li><a href="listerMateriel.php">Lister Materiel</a></li>
                      <li><a href="emprunter.php">Lister les Materiels Restituer</a></li>
                      <li><a href="RestituerPasMateriel.php">Lister les Materiels Non Restituer</a></li>
                      <li><a href="listerMaterielsDisponible.php">Lister matériel disponible</a></li>
                      
                  </ul>
              </li>
              <li class="nav">
                <a href="lister.php">Lister</a>
              </li>
              <li class="nav">
                <a href="listerMateriel.php">ListerMateriel</a>
              </li>
              <li class="nav">
                <a href="rechercherMateriel.php">RechercherMateriel</a>
              </li>
              <li class="nav">
                <a href="supprimerMateriel.php">SupprimerMateriel</a>
              </li>
              <li class="nav">
                <a href="modifierMateriel.php">ModifierMateriel</a>
              </li>
              <li class="nav">
                <a href="ajouterMateriel.php">AjouterMateriel</a>
              </li>
              <li class="nav">
                <a href="ajouter.php">Ajouter</a>
              </li>
              <li class="nav">
                <a href="rechercher.php">Rechercher</a>
              </li>
              <li class="nav">
                <a href="supprimer.php">supprimer</a>
              </li>
                <li class="nav">
              <a href="modifier.php">modifier</a>
              </li>
              <li class="nav">
                <a href="emprunter.php">Restituer</a>
              </li>
              <li class="nav">
                <a href="RestituerPasMateriel.php">Non restituer</a>
              </li>
              <li class="nav">
                <a href="AjouterEmprunter.php">Ajouter Emprunter</a>
              </li>
              <li class="nav">
                <a href="AjouterRestituer.php">Ajouter Restituer</a>
              </li>
              <li class="nav">
                <a href="listerMaterielsDisponible.php">Lister matériel disponible</a>
              </li>
              -->          

