<?php

// FONCTIONs POUR L'ACCES A LA BASE DE DONNEES
// Ajouter en t�tes 
// Voir : jeu de caract�res � la connection

/** 
 * Se connecte au serveur de donn�es                     
 * Se connecte au serveur de donn�es � partir de valeurs
 * pr�d�finies de connexion (h�te, compte utilisateur et mot de passe). 
 * Retourne l'identifiant de connexion si succ�s obtenu, le bool�en false 
 * si probl�me de connexion.
 * @return resource identifiant de connexion
 */
function connecterServeurBD() 
{
    $PARAM_hote='localhost'; // le chemin vers le serveur
    $PARAM_port='8889';
    $PARAM_nom_bd='gsbVisiteur'; // le nom de votre base de donn�es
    $PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe='root'; // mot de passe de l'utilisateur pour se connecter

    $connect = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
 
    return $connect;
}

function lister()
{
    $connexion = connecterServeurBD();
   
    $requete="select vis_matricule, vis_nom, vis_prenom, vis_adresse, vis_cp, vis_ville from visiteur";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $visiteur[$i]['vis_matricule']=$ligne['vis_matricule'];
        $visiteur[$i]['vis_nom']=$ligne['vis_nom'];
        $visiteur[$i]['vis_prenom']=$ligne['vis_prenom'];
        $visiteur[$i]['vis_adresse']=$ligne['vis_adresse'];
        $visiteur[$i]['vis_cp']=$ligne['vis_cp'];
        $visiteur[$i]['vis_ville']=$ligne['vis_ville'];

        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $visiteur;
}

function listerMaterielle()
{
    $connexion = connecterServeurBD();
   
    $requete="select Id, Marque, Dimension, Modele from materiel";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $materiel[$i]['Id']=$ligne['Id'];
        $materiel[$i]['Marque']=$ligne['Marque'];
        $materiel[$i]['Dimension']=$ligne['Dimension'];
        $materiel[$i]['Modele']=$ligne['Modele'];
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $materiel;
}

function ajouterMaterielle($ref, $marque, $dimension, $modele,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
  // Cr�er la requ�te d'ajout 
  $requete="insert into materiel"
  ."(id, marque, dimension, modele) values ('"
  .$ref."','"
  .$marque."','"
  .$dimension."','"
  .$modele."');";
  
  // Lancer la requ�te d'ajout 
  $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
  // Si la requ�te a r�ussi
  if ($ok)
  {
    $message = "Le materiel a �t� correctement ajout�e";
    ajouterErreur($tabErr, $message);
    }
  else
  {
    $message = "Attention, l'ajout du materiel a �chou� !!!";
    ajouterErreur($tabErr, $message);
  } 

}
                                                                  
function ajouterVisi2($id, $nom, $prenom, $mdp, $mdp1, $role, $mail, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant

  $connexion = connecterServeurBD();
    
  if($mdp != $mdp1)
  {
    $message = "les deux mots de passe sont different";
    ajouterErreur($tabErr, $message);
  }
  else
  { if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    // Cr�er la requ�te d'ajout 
    $requete="insert into visiteur"
    ."(`VIS_MATRICULE`, `VIS_NOM`,`VIS_PRENOM`,`mdp`, `mdp1`, `role`, `adresseMail`) values ('"
    .$id."','"
    .$nom."','"
    .$prenom."','"
    .$mdp."','"
    .$mdp1."','"
    .$role."','"
    .$mail."');";

   
  
  

  // Lancer la requ�te d'ajout 
  $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
  // Si la requ�te a r�ussi
  if ($ok)
  {
    $requete="select `VIS_MATRICULE`, `VIS_NOM`,`VIS_PRENOM`,`mdp`, `mdp1`, `role`, `adresseMail` from visiteur";
  $requete=$requete." where `adresseMail` like '%@%' and `mdp`= `mdp1`;";   
        $ok=$connexion->query($requete);
        $message = "L'utilisateur a �t� correctement ajout�e";
        ajouterErreur($tabErr, $message);
    }}
    else{
     
        $message = "Attention, l'ajout de l'utilisateur a �chou� !!!";
        ajouterErreur($tabErr, $message);
      
    }
  
 
  }

}

function inscription1($id, $nom, $prenom, $adresse, $cp, $ville, $mail, $role, $mdp, $mdp1, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
  if($mdp != $mdp1)
  {
    $message = "les deux mots de passe sont different";
    ajouterErreur($tabErr, $message);
  }
  else
  { if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    // Cr�er la requ�te d'ajout 
  $requete="insert into visiteur"
  ."(`VIS_MATRICULE`, `VIS_NOM`,`VIS_PRENOM`, `VIS_ADRESSE`, `VIS_CP`, `VIS_VILLE`, `adresseMail`, `role`, `mdp`, `mdp1`) values ('"
  .$id."','"
  .$nom."','"
  .$prenom."','"
  .$adresse."','"
  .$cp."','"
  .$ville."','"
  .$mail."','"
  .$role."','"
  .$mdp."','"
  .$mdp1."');";

   
  
  

  // Lancer la requ�te d'ajout 
  $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
  // Si la requ�te a r�ussi
  if ($ok)
  {
    $requete="select `VIS_MATRICULE`, `VIS_NOM`,`VIS_PRENOM`, `VIS_ADRESSE`, `VIS_CP`, `VIS_VILLE`,`adresseMail`, `role`, `mdp`, `mdp1` from visiteur";
    $requete=$requete." where `adresseMail` like '%@%' and `mdp`= `mdp1`;";    
        $ok=$connexion->query($requete);
        $message = "L'utilisateur a �t� correctement ajout�e";
        ajouterErreur($tabErr, $message);
    }}
    else{
     
        $message = "Attention, l'ajout de l'utilisateur a �chou� !!!";
        ajouterErreur($tabErr, $message);
      
    }
  
 
  }
}
function rechercher($des)
{
    $connexion = connecterServeurBD();
    
    $visiteur = array();
   
    $requete="select vis_matricule, vis_nom, vis_prenom, vis_adresse, vis_cp, vis_ville from visiteur";
      $requete=$requete." where vis_nom='".$des."';";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
      $visiteur[$i]['vis_matricule']=$ligne['vis_matricule'];
      $visiteur[$i]['vis_nom']=$ligne['vis_nom'];
      $visiteur[$i]['vis_prenom']=$ligne['vis_prenom'];
      $visiteur[$i]['vis_adresse']=$ligne['vis_adresse'];
      $visiteur[$i]['vis_cp']=$ligne['vis_cp'];
      $visiteur[$i]['vis_ville']=$ligne['vis_ville'];

        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $visiteur;
}
function rechercherMaterielle($des)
{
    $connexion = connecterServeurBD();
    
    $materiel = array();
   
    $requete="select Id, Marque, Dimension, Modele from materiel";
      $requete=$requete." where Id='".$des."';";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
      $materiel[$i]['Id']=$ligne['Id'];
        $materiel[$i]['Marque']=$ligne['Marque'];
        $materiel[$i]['Dimension']=$ligne['Dimension'];
        $materiel[$i]['Modele']=$ligne['Modele'];
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $materiel;
}

function supprimer($ref, &$tabErr)
{
    $connexion = connecterServeurBD();
    
    $visiteur = array();
          
    $requete="delete from visiteur";
    $requete=$requete." where vis_matricule='".$ref."';";
    
    // Lancer la requ�te supprimer
    $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      
    // Si la requ�te a r�ussi
    if ($ok)
    {
      $message = "Le visiteur a �t� correctement supprim�e";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      $message = "Attention, la suppression du visiteur a �chou� !!!";
      ajouterErreur($tabErr, $message);
    }      
}

function supprimerMaterielle($ref, &$tabErr)
{
    $connexion = connecterServeurBD();
    
    $materiel = array();
          
    $requete="delete from materiel";
    $requete=$requete." where id='".$ref."';";
    
    // Lancer la requ�te supprimer
    $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      
    // Si la requ�te a r�ussi
    if ($ok)
    {
      $message = "Le materiel a �t� correctement supprim�e";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      $message = "Attention, la suppression du materiel a �chou� !!!";
      ajouterErreur($tabErr, $message);
    }      
}




function modifier($ref, $nom, $prenom, $adresse, $cp, $ville,&$tabErr)
{
  
    // Ouvrir une connexion au serveur mysql en s'identifiant
    $connexion = connecterServeurBD();
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from visiteur";
    $requete=$requete." where vis_matricule = '".$ref."';";              
   
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    // Cr�er la requ�te de modification 
  
    $requete= "UPDATE visiteur SET vis_adresse = '$adresse',
    `vis_nom` = '$nom',
    `vis_prenom` = '$prenom',
    `vis_cp` = '$cp',
    `vis_ville` = '$ville' WHERE `vis_matricule`='$ref';";
         
    // Lancer la requ�te d'ajout 
    $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      
    // Si la requ�te a r�ussi
    if ($ok)
    {
      $message = "Le visiteur a �t� correctement modifi�";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      $message = "Attention, la modification du visiteur a �chou� !!!";
      ajouterErreur($tabErr, $message);
    } 
}

function modifierMaterielle($ref, $marque, $dimension, $modele,&$tabErr)
{
  
    // Ouvrir une connexion au serveur mysql en s'identifiant
    $connexion = connecterServeurBD();
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from materiel";
    $requete=$requete." where id = '".$ref."';";              
   
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    // Cr�er la requ�te de modification 
  
    $requete= "UPDATE materiel SET marque = '$marque',
    `dimension` = '$dimension',
    `modele` = '$modele'
     WHERE `id`='$ref';";
         
    // Lancer la requ�te d'ajout 
    $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      
    // Si la requ�te a r�ussi
    if ($ok)
    {
      $message = "Le materiel a �t� correctement modifi�";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      $message = "Attention, la modification du materiel a �chou� !!!";
      ajouterErreur($tabErr, $message);
    } 
}


// function rechercherUtilisateur($log, $psw, &$tabErr)
// {
//     $connexion = connecterServeurBD();
      
//     $requete="select * from visiteur";
//     $requete=$requete." where nom='".$log."' and mdp ='".$psw."';";
//     $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
//     // Initialisationd e la cat�gorie trouv�e � : "aucune"
//     $cat = "nulle";
    
//     $ligne = $jeuResultat->fetch();
    
//     // Si un utilisateur est trouv�, on initialise une variable cat avec la cat�gorie de cet utilisateur trouv�e dans la table utilisateur
//     if ($ligne)
//     {
//         $cat = $ligne['cat'];
//     }
//     $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
//   return $cat;
// }
function listerEmprunter()
{
    $connexion = connecterServeurBD();
   
    $requete="select dateEmprunter, dateRestituer, vis_matricule, idMateriel from emprunter where dateRestituer is not null";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $emprunt[$i]['dateEmprunter']=$ligne['dateEmprunter'];
        $emprunt[$i]['dateRestituer']=$ligne['dateRestituer'];
        $emprunt[$i]['vis_matricule']=$ligne['vis_matricule'];
        $emprunt[$i]['idMateriel']=$ligne['idMateriel'];
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $emprunt;
}

function listerPasRestituer()
{
    $connexion = connecterServeurBD();
   
    $requete="select dateEmprunter, dateRestituer, vis_matricule, idMateriel from emprunter where dateRestituer is null";
    
    $jeuResultat=$connexion->query($requete); 
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $emprunt[$i]['dateEmprunter']=$ligne['dateEmprunter'];
        $emprunt[$i]['dateRestituer']=$ligne['dateRestituer'];
        $emprunt[$i]['vis_matricule']=$ligne['vis_matricule'];
        $emprunt[$i]['idMateriel']=$ligne['idMateriel'];
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   
  
  return $emprunt;
}

function ajouterEmprunt($dateEmprunter, $vis_matricule, $idMateriel,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
  $requete="select dateEmprunter, vis_matricule, idMateriel from emprunter";
  $requete=$requete." where idMateriel = '".$idMateriel."' and dateRestituer is not null;";   
  // Cr�er la requ�te d'ajout 
  
  
  // Lancer la requ�te d'ajout 
  $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
  // Si la requ�te a r�ussi
  if ($ok<=1)
  {
        $requete="insert into emprunter"
        ."(dateEmprunter, vis_matricule, idMateriel) values ('"
        .$dateEmprunter."','"
        .$vis_matricule."','"
        .$idMateriel."');";
        $ok=$connexion->query($requete);
        
        $message = "L'emprunt a �t� correctement ajout�e";
        ajouterErreur($tabErr, $message);
    }
  else
  {
    $message = "Attention, l'ajout de l'emprunt a �chou� !!!";
    ajouterErreur($tabErr, $message);
  } 

}

function ajouterRestituer( $dateRestituer, $vis_matricule, $idMateriel,&$tabErr)
{
  
  $connexion = connecterServeurBD();
  $requete="select vis_matricule, idMateriel from emprunter";
  $requete=$requete." where vis_matricule = '".$vis_matricule."' and idMateriel = '".$idMateriel."' and dateRestituer is null;";   
  // Cr�er la requ�te d'ajout 
  $requete="update emprunter"
  ." set dateRestituer ='".$dateRestituer."'
  where idMateriel = '".$idMateriel."'
  and vis_matricule = '".$vis_matricule."';";          
 
  $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant


  
  // Si la requ�te a r�ussi
  if ($ok>=1)
  {
    $message = "Le matériel a �t� correctement restituer";
    ajouterErreur($tabErr, $message);
    }
  else
  {
    $message = "Attention, la réstitution de l'emprunt a �chou� !!!";
    ajouterErreur($tabErr, $message);
  } 

}

function listerMaterielDisponible()
{
    $connexion = connecterServeurBD();
   
    $requete="SELECT `Id`, `Marque`, `Modele`, `Dimension` FROM materiel WHERE Id not in (SELECT emprunter.idMateriel from emprunter where emprunter.dateRestituer is null)";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $emprunt[$i]['Id']=$ligne['Id'];
        $emprunt[$i]['Marque']=$ligne['Marque'];
        $emprunt[$i]['Modele']=$ligne['Modele'];
        $emprunt[$i]['Dimension']=$ligne['Dimension'];
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $emprunt;
}

// function inscription($unNom, $unMdp, $unMdpConf, &$tabErr)
// {
//   // Ouvrir une connexion au serveur mysql en s'identifiant
//   $connexion = connecterServeurBD();
//     if($unMdp != $unMdpConf)
//     {
//       $message = "les deux mots de passe sont different";
//       ajouterErreur($tabErr, $message);
//     }
//     else
//     {
//        // Cr�er la requ�te d'ajout 
//       $requete="insert into visiteur"
//       ."(adresseMail,mdp) values ('"
//       .$unNom."','"
//       .$unMdp."');";
  
//       // Lancer la requ�te d'ajout 
//       $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
//   // Si la requ�te a r�ussi
//       if ($ok)
//       {
//        $message = "L'utilisateur a �t� correctement ajout�e";
//        ajouterErreur($tabErr, $message);
//        }
//       else
//       {
//        $message = "Attention, l'ajout de l'utilisateur a �chou� !!!";
//         ajouterErreur($tabErr, $message);
//       } 
//     }
 

// }

// function rechercherVisiteur($log, $psw, &$tabErr)
// {
//     $connexion = connecterServeurBD();
      
//     $requete="select * from visiteur";
//       $requete=$requete." where adresseMail='".$log."' and mdp ='".$psw."';";
//       $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
//     $i = 0;
//     $ligne = $jeuResultat->fetch();
//     while($ligne)
//     {
//         $visiteur[$i]['adresseMail']=$ligne['adresseMail'];
//         $visiteur[$i]['mdp']=$ligne['mdp'];

//         $ligne=$jeuResultat->fetch();
//         $i = $i + 1;
//     }
//     $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
//   return $visiteur;
// }



// function connection($id,$mdp, &$tabErr)
// {
//   $connexion = connecterServeurBD();
//   $fleur = array();
   
//   $requete="select VIS_MATRICULE, mdp from visiteur";
//     $requete=$requete." where VIS_MATRICULE='".$id."'and mdp='".$mdp."';";
  
//   $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

//   $i = 0;
//   $ligne = $jeuResultat->fetch();
//   while($ligne)
//   {
//     $fleur[$i]['VIS_MATRICULE']=$ligne['VIS_MATRICULE'];
//       $fleur[$i]['mdp']=$ligne['mdp'];
//       $ligne=$jeuResultat->fetch();
//       $i = $i + 1;
//   }
//   $jeuResultat->closeCursor();   // fermer le jeu de r�sultat

// return $fleur;

// }
function rechercherUtilisateur($mail, $mdp, &$tabErr)
{
    $connexion = connecterServeurBD();
      
    $requete="select * from visiteur";
      $requete=$requete." where adresseMail='".$mail."' and mdp='".$mdp."';";
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    // Initialisationd e la cat�gorie trouv�e � : "aucune"
    $cat = "nulle";
    
    $ligne = $jeuResultat->fetch();
    
    // Si un utilisateur est trouv�, on initialise une variable cat avec la cat�gorie de cet utilisateur trouv�e dans la table utilisateur
    if ($ligne)
    {
        $cat = $ligne['role'];
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $cat;
}

?>
