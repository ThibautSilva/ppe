<?php
foreach( $LeClub as $unClub)
{
    $idc = $unClub['idc'];
    $club = $unClub['nom'];
    $ville = $unClub['ville'];
    $nomdirigeant = $unClub['nomdirigeant'];
    $prenomdirigeant = $unClub['prenomdirigeant'];
?>
<h2>Fiche Club</h2>
<?php
    echo "<p>Nom du Club : " . $club;
    echo "<p>Ville du Club : " . $ville;
    echo "<p>Dirigeant: " . $nomdirigeant ." ". $prenomdirigeant;
    echo "<p><a href=index.php?uc=GestionAdmin&club=$idc&action=VoirJoueursDuClub>Joueurs du club </a></p>";
    echo "<a href=index.php?uc=GestionAdmin&action=ModifierClub&club=$idc> <input type='submit' value='Modifier' style='width: 200px'/></a>";
    echo "<a href=index.php?uc=GestionAdmin&action=SupprimerClub&idc=$idc onclick=\"return confirm('Voulez-vous vraiment supprimer ce Club?');\"> <input type='button' value='Supprimer' style='width: 200px'/></a>";
} ?>