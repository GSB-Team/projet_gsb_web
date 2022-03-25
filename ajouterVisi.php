


<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
// Initialise les ressources n�cessaires au fonctionnement de l'application

  $repVues = './vues/';
  require("./include/_bdGestionDonnees.lib.php");
  require("./include/_gestionSession.lib.php");
  require("./include/_utilitairesEtGestionErreurs.lib.php");
  // d�marrage ou reprise de la session
  initSession();
  // initialement, aucune erreur ...
  $tabErreurs = array();
    

// DEBUT du contr�leur ajouter.php

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  $unId=$_POST["VIS_MATRICULE"];
  $unNom=$_POST["VIS_NOM"];
  $unPrenom=$_POST["VIS_PRENOM"];
  $unMdp=$_POST["mdp"];
  $unMdp1=$_POST["mdp1"];
  $unRole=$_POST["role"];
  $unMail=$_POST["adresseMail"];
  ajouterVisi2($unId, $unNom, $unPrenom, $unMdp, $unMdp1, $unRole, $unMail, $tabErreurs);
}

// D�but de l'affichage (les vues)

include($repVues."entete.php");
include($repVues."menu.php");
include($repVues."erreur.php");
include($repVues."vAjouterVisi.php");
include($repVues."pied.php");
?>
  