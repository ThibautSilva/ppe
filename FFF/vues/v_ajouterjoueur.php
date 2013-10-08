<form method="POST" action="index.php?uc=GestionAdmin&action=AjouterJoueur">
    <fieldset>
        <p>
            <label for="nom">Nom :</label>
            <input id="nom" type="text" name="nom" value="" size="10" >
        <p>
            <label for="prenom">Prenom :</label>
            <input id="prenom" type="text" name="prenom" value="" size="10" >
        </p>
            <label for="datenaiss">Date de naissance : (ex: 1994-12-24)</label>
            <input id="datenaiss" type="text" name="datenaiss" value="" size="10" maxlength="10"><br />
        </p>
        <p>
            <label for="idcat">Categorie :</label>
            <select name='idcat'>
                <?php
                foreach( $LesCategories as $UnCategorie){
                    $idCat = $UnCategorie['idcat'];
                    $nomCat = $UnCategorie['nomcategories'];
                    echo "<option value=\"".$idCat."\">". $nomCat."</option>";
                }?>

            </select><br />
        </p>
        <p>
            <label for="nlicence">N°Licence :</label>
            <input id="nlicence" type="text" name="nlicence" value="" size="10" maxlength="10">
        </p>
        <p>
            <label for="idc">Club :</label>
            <select name='idc'>
            <?php
            foreach( $LesClubs as $unClub)
            {
            $idc = $unClub['idc'];
            $club = $unClub['nom'];
            echo "<option value=\"".$idc."\">". $club."</option>";
            }
            ?>
            </select><br />

        </p>
        <p>
            <input type="submit" value="Valider" name="valider">
            <input type="reset" value="Annuler" name="annuler">
        </p>
        </p>
    </fieldset>
</form>