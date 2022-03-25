<!--Saisir les informations dans un formulaire!-->
<div class="container">
  <form name="formAjout" action="" method="post" onSubmit="return valider()">
    <fieldset>
      <legend>Entrez votre nom d'utilisateur et mot de passe </legend>
      <label> Adresse Mail : </label> <input type="text" name="adresseMail" size="10" /><br />
      <label> Mot de passe :</label> <input type="password" name="mdp" size="20" /><br />
    </fieldset>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <button type="reset" class="btn">Annuler</button>
  </form>
</div>
