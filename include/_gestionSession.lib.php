<?php
/** 
 * Regroupe les fonctions de gestion d'une session utilisateur.
 * @package default
 * @todo  RAS
 */

/** 
 * Démarre ou poursuit une session.                     
 *
 * @return void
 */
function initSession() {
    session_start();
}


/**
 * Conserve en variables session les informations du visiteur connecté
 * 
 * Conserve en variables session le nom et le mot de passe du visiteur connecté
 * @param string $nom  visiteur
 * @param string $mdp du visiteur
 * @param string $cat du visiteur
 * @return void    
 */
function connecter($mail, $mdp, $cat) {
    $_SESSION["adresseMail"] = $mail;
    $_SESSION["mdp"] = $mdp;
    $_SESSION["role"] = $cat;
    
}

/** 
 * Déconnecte le visiteur qui s'est identifié sur le site.                     
 *
 * @return void
 */
function deconnecter() {
    unset($_SESSION["adresseMail"]);
    unset($_SESSION["mdp"]);
    unset($_SESSION["role"]);
}

/** 
 * Vérifie si un client ou un admin s'est connecté sur le site.                     
 *
 * Retourne true si quelqu'un s'est connecté sur le site, false sinon. 
 * @return boolean 
 */
function estConnecte() {
    // actuellement il n'y a que les visiteurs qui se connectent
    return isset($_SESSION["adresseMail"]);
}

/** 
 * Vérifie si un client s'est connecté sur le site.                     
 *
 * Retourne true si un client s'est connecté sur le site, false sinon. 
 * @return boolean échec ou succès
 */
function estVisiteurConnecte() 
{
    $connecte = false;
    if (isset($_SESSION["adresseMail"]))
    {
        if ($_SESSION["role"]=="visiteur")
        {
           $connecte = true; 
        }
    }
    
    return $connecte;
}

/** 
 * Vérifie si un administrateur s'est connecté sur le site.                     
 *
 * Retourne true si un adminsitrateur s'est connecté sur le site, false sinon. 
 * @return boolean échec ou succès
 */
function estAdministrateurConnecte() 
{
    $connecte = false;
    if (isset($_SESSION["adresseMail"]))
    {
        if ($_SESSION["role"]=="admin")
        {
           $connecte = true; 
        }
    }    
    return $connecte;
}
?>