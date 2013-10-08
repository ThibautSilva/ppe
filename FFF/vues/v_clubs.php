<a href=index.php?uc=GestionAdmin&action=AjouterClub><input type='button' value='Ajouter un Club' style='width: 200px'/></a>
<?php
foreach( $LesClubs as $unClub)
{
    $idc = $unClub['idc'];
    $club = $unClub['nom'];
    ?>
    <li>

        <a href=index.php?uc=GestionAdmin&club=<?php echo $idc ?>&action=FicheClub><?php echo $club ?></a>
    </li>
<?php
}
?>