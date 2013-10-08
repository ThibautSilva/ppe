<form method="POST" action="index.php?uc=GestionAdmin&action=ModifierJoueur">
    <fieldset>
        <p>
            <label for="nom">Nom :</label>
            <input id="nom" type="text" name="nom" value="<?php echo $nom ?>" size="10" maxlength="10" style=" width: auto">
        <p>
            <label for="prenom">Prenom :</label>
            <input id="prenom" type="text" name="prenom" value="<?php echo $prenom ?>" size="10" maxlength="10">
        </p>
        <p>
            <label for="datenaiss">Date de Naissance :</label>
            <input id="datenaiss" type="text" name="datenaiss" value="<?php echo $datenaiss ?>" size="10" maxlength="10">
        </p>
        <p>
            <label for="categorie">Categorie :</label>
            <input id="idcat" type="text" name="idcat" value="<?php echo $idcat ?>" size="10" maxlength="10">
        </p>
        <p>
            <label for="nlicence">N°Licence :</label>
            <input id="nlicence" type="text" name="nlicence" value="<?php echo $nlicence ?>" size="10" maxlength="10">
        </p>
        <p><!-------->
            <label for="idc">Club :</label>
            <select name='idc'>
                <?php
                foreach( $LesClubs as $unClub)
                {
                    $idc = $unClub['idc'];
                    $club = $unClub['nom'];
                    echo "<option";
                    if ($idc == $oldidc){
                        echo " selected=\"selected\"";
                    }
                    echo " value=\"".$idc."\">". $club."</option>";
                }

                ?>
            </select><br />
            <input id="idjoueur" type="hidden" name="idjoueur" value="<?php echo $idj ?>">
        </p>
        <p>
            <input type="submit" value="Valider" name="valider">
            <input type="reset" value="Annuler" name="annuler">
        </p>
        </p>
    </fieldset>
</form>