





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
  $uneAdresse=$_POST["VIS_ADRESSE"];
  $unCP=$_POST["VIS_CP"];
  $unVille=$_POST["VIS_VILLE"];
  $unMail=$_POST["adresseMail"];
  $unRole=$_POST["role"];
  $unMdp=$_POST["mdp"];
  $unMdp1=$_POST["mdp1"];
  inscription1($unId, $unNom, $unPrenom, $uneAdresse, $unCP, $unVille, $unMail ,  $unRole, $unMdp ,$unMdp1,  $tabErreurs);
}

// D�but de l'affichage (les vues)

include($repVues."entete.php");
include($repVues."menu.php");
include($repVues."erreur.php");
include($repVues."vInscription.php");
include($repVues."pied.php");
?>
  

