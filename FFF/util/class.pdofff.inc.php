<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Thib'
 * Date: 13/09/13
 * Time: 14:02
 * To change this template use File | Settings | File Templates.
 */
class Pdofff
{
    private static $serveur='mysql:host=localhost';
    private static $bdd='dbname=mlg';
    private static $user='root' ;
    private static $mdp='' ;
    private static $monPdo;
    private static $monPdofff = null;
    /**
     * Constructeur privé, crée l'instance de PDO qui sera sollicitée
     * pour toutes les méthodes de la classe
     */
    private function __construct()
    {
        Pdofff::$monPdo = new PDO(Pdofff::$serveur.';'.Pdofff::$bdd, Pdofff::$user, Pdofff::$mdp);
        Pdofff::$monPdo->query("SET CHARACTER SET utf8");
    }
    public function _destruct(){
        Pdofff::$monPdo = null;
    }
    /**
     * Fonction statique qui crée l'unique instance de la classe
     *
     * Appel : $instancePdolafleur = PdoLafleur::getPdoLafleur();
     * @return l'unique objet de la classe PdoLafleur
     */
    public  static function getPdofff()
    {
        if(Pdofff::$monPdofff == null)
        {
            Pdofff::$monPdofff= new Pdofff();
        }
        return Pdofff::$monPdofff;
    }
    /**
     * Retourne toutes les clubs avec un tableau associatif
     *
     * @return le tableau associatif des catégories
     */
    public function getLesClubs() // fonction club
    {
        $req = "select * from clubs";
        $res = Pdofff::$monPdo->query($req);
        $lesClubs = $res->fetchAll();
        return $lesClubs; // fin fonction club
    }
    public function getFicheClub($idc) //Recuperer les infos du club
    {
        $req = "select * from clubs where idc='".$idc."'";
        $res = Pdofff::$monPdo->query($req);
        $LeClub = $res->fetchAll();
        return $LeClub;
    }

    public function getLesJoueurs() // fonction joueurs
    {
        $req = " select * from joueurs";
        $res = Pdofff::$monPdo->query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes; // fin fonction joueurs
    }
    public function testLogAdmin($l, $p)
    {
        $req = "select count(*) from compte where user = '".$l."' and mdp ='".$p."'";
        $res = Pdofff::$monPdo->query($req);
        $leResu = $res->fetch();
        // test echo var_dump($leResu);
        return $leResu;
    }
    public function ajouterclub ($nom, $ville, $nomdirigeant, $prenomdirigeant)                   //************
    {
        $req = "INSERT INTO clubs (idc, nom, ville, nomdirigeant, prenomdirigeant) VALUES ('','".$nom."', '".$ville."', '$nomdirigeant', '".$prenomdirigeant."');";
        Pdofff::$monPdo->query($req);
    }
    public function modifierclub($idc, $nom, $ville, $nomdirigeant, $prenomdirigeant)
    {
        $req = "UPDATE clubs SET nom='".$nom."', ville='".$ville."', nomdirigeant = '".$nomdirigeant."', prenomdirigeant='".$prenomdirigeant."' where idc='".$idc."';";
        Pdofff::$monPdo->exec($req);
    }
    public function SupprimerClub($idc)
    {
        $req = "DELETE from clubs where idc = ".$idc.";";
        Pdofff::$monPdo->exec($req);
    }
    public function ajouterjoueur ($nom,$prenom, $datenaiss, $nlicence, $idc, $idcat)
    {
        $req = "INSERT INTO joueurs (idj, nom, prenom, datenaiss, nlicence, idc, idcat) VALUES ('','".$nom."', '".$prenom."', '$datenaiss', '".$nlicence."','".$idc."','".$idcat."');";
        Pdofff::$monPdo->query($req);
        $req = "INSERT INTO inscrire (datei, idc, idj) VALUES ('".date("Y-n-j")."', '".$idc."', (SELECT MAX(idj) FROM joueurs));";
        Pdofff::$monPdo->query($req);
    }
    public function modifierjoueur($idj, $nom,$prenom, $datenaiss, $nlicence, $idcat, $idc)
    { /********************/
        $req = "SELECT idc FROM joueurs WHERE idj='".$idj."';";
        $res = Pdofff::$monPdo->query($req);
        $oldidc = $res->fetchAll();
        $req = "UPDATE joueurs SET nom='".$nom."', prenom='".$prenom."', datenaiss='".$datenaiss."', nlicence='".$nlicence."', idcat='".$idcat."' where idj='".$idj."';";
        Pdofff::$monPdo->exec($req);
        if ($oldidc[0]['idc'] != $idc){
            $req = "INSERT INTO inscrire (datei, idc, idj) VALUES ('".date("Y-n-j")."', '".$idc."', '".$idj."');";
            Pdofff::$monPdo->exec($req);
        }
    }/*******************/
    public function getLesJoueursDeClub($idc) // fonction joueurs
    {
        $req = " select * from joueurs WHERE idc='".$idc."'";
        $res = Pdofff::$monPdo->query($req);
        $lesJoueurs = $res->fetchAll();
        return $lesJoueurs; // fin fonction joueurs
    }
    public function getFicheJoueur($idj)
    {
        $req = "select * from joueurs where idj='".$idj."'";
        $res = Pdofff::$monPdo->query($req);
        $LeJoueur = $res->fetchAll();
        return $LeJoueur;
    }
    public function getHistorique($idj){
        $req = "SELECT datei, nom FROM inscrire, clubs WHERE inscrire.idc = clubs.idc AND idj='".$idj."' ORDER BY datei";
        $res = Pdofff::$monPdo->query($req);
        $Historique = $res->fetchAll();
        return $Historique;
    }
    public function getLesCategories(){
        $req = "SELECT idcat, nomcategories FROM categories;";
        $res = Pdofff::$monPdo->query($req);
        $Categories = $res->fetchAll();
        return $Categories;
    }
    public function resultRecherche($idcat){
        $req = "SELECT * FROM joueurs WHERE idcat ='".$idcat."';";
        $res = Pdofff::$monPdo->query($req);
        $lesJoueurs = $res->fetchAll();
        return $lesJoueurs;
    }
}