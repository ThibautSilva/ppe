<form method="POST" action="index.php?uc=GestionAdmin&action=Rechercher">
<select name='idcat'>
<?php
foreach( $LesCategories as $UnCategorie){
        $idCat = $UnCategorie['idcat'];
        $nomCat = $UnCategorie['nomcategories'];
        echo "<option value=\"".$idCat."\">". $nomCat."</option>";
}?>
</select>
<input type="submit" value="valider" name="valider"><br />
</form>
<a href=index.php?uc=GestionAdmin&action=AjouterJoueur><input type='button' value='Ajouter un joueur' style='width: 200px'/></a>
<?php
foreach( $lesJoueurs as $leJoueur)
{
    $idj = $leJoueur['idj'];
    $Njoueur = $leJoueur['nom'];
    $Pjoueur = $leJoueur['prenom'];
    ?>
    <li>
        <a href=index.php?uc=GestionAdmin&idjoueur=<?php echo $idj ?>&action=FicheJoueur><?php echo $Njoueur." ".$Pjoueur?></a>
    </li>
<?php
}
?>