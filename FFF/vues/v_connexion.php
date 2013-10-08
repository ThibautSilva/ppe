<form method="POST" action="index.php?uc=GestionAdmin&action=connexion">
    <fieldset>
        <legend>Connexion Administrateur</legend>
        <p>
            <label for="login">Login : </label>
            <input id="login" type="text" name="login" value="Votre Login" size="30" maxlength="45">
        </p>
        <p>
            <label for="pass">Mot de passe : </label>
            <input id="pass" type="password" name="pass" value="Votre Mot de Passe" size="30" maxlength="45">
        </p>
        <p>
            <input type="submit" value="Valider" name="valider">
            <input type="reset" value="Annuler" name="annuler">
        </p>
</form>