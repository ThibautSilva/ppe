<form method="POST" action="index.php?uc=GestionAdmin&action=ModifierClub">
    <fieldset>
        <p>
            <label for="nom">Nom :</label>
            <input id="nom" type="text" name="nom" value="<?php echo $nom ?>" size="10" maxlength="10" style=" width: auto">
        <p>
            <label for="ville">Ville :</label>
            <input id="ville" type="text" name="ville" value="<?php echo $ville ?>" size="10" maxlength="10">
        </p>
        <p>
            <label for="nomdirigeant">Nom du dirigeant :</label>
            <input id="nomdirigeant" type="text" name="nomdirigeant" value="<?php echo $nomdirigeant ?>" size="10" maxlength="10">
        </p>
        <p>
            <label for="prenomdirigeant">Prenom du dirigeant :</label>
            <input id="prenomdirigeant" type="text" name="prenomdirigeant" value="<?php echo $prenomdirigeant ?>" size="10" maxlength="10">
            <input id="club" type="hidden" name="club" value="<?php echo $idc ?>">
        </p>
        <p>
            <input type="submit" value="Valider" name="valider">
            <input type="reset" value="Annuler" name="annuler">
        </p>
        </p>
    </fieldset>
</form>