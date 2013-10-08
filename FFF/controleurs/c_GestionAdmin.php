<?php
if (isset($_REQUEST['action'])){
    $action = $_REQUEST['action'];
} else {
    $action = 'connexion';
}
if ($_SESSION['admin']!=1){
    $action = 'connexion';
}/*********************

var_dump($_REQUEST);
var_dump($_SESSION);
echo $action;/*****************/
switch($action){
    case 'connexion':
    {
        if(isset($_POST['login']) && (isset($_POST['pass']))){
            $log = $_POST['login'];
            $mdp = $_POST['pass'];
            //il faut se connecter à la BD
            $resu = $pdo->testLogAdmin($log, $mdp);

            if($resu[0] == 0){
                header("Location: /fff/index.php?uc=GestionAdmin&action=connexion");
            }else{
                $_SESSION['admin']=1;
                header("Location: /fff/index.php?uc=accueil");
            }
        }else{
            include("vues/v_connexion.php");
        }
        break;
    }
    case 'deconnexion': /************************/
    {
        $_SESSION['admin']=0;
        header("Location: /fff/index.php?uc=GestionAdmin&action=connexion");
        break;
    }  /******************************/
    case 'VoirClubs':
    {
        $LesClubs = $pdo->getLesClubs();
        include("vues/v_clubs.php");
        break;
    }
    case 'VoirJoueurs':
    {
         $lesJoueurs = $pdo->getLesJoueurs();
         $LesCategories = $pdo->getLesCategories();
         include ("vues/v_joueurs.php");
        break;
    }
    case 'Rechercher':
    {
        $idcat = $_REQUEST['idcat'];
        $lesJoueurs = $pdo->resultRecherche($idcat);
        $LesCategories = $pdo->getLesCategories();
        include ("vues/v_joueurs.php");
        break;
    }
    case 'VoirJoueursDuClub':
    {
        $idc = $_REQUEST['club'];
        $lesJoueurs = $pdo->getLesJoueursDeClub($idc);
        $LesCategories = $pdo->getLesCategories();
        include("vues/v_joueurs.php");
        break;
    }
    case 'AjouterClub':
    {
        if(isset($_REQUEST['nom']) && (isset($_REQUEST['ville']) && (isset($_REQUEST['nomdirigeant']) && (isset($_REQUEST['prenomdirigeant']))))){
            $nom = $_REQUEST['nom'];
            $ville = $_REQUEST['ville'];
            $nomdirigeant = $_REQUEST['nomdirigeant'];
            $prenomdirigeant = $_REQUEST['prenomdirigeant'];
            $pdo->ajouterclub ($nom, $ville, $nomdirigeant, $prenomdirigeant);
            $LesClubs = $pdo->getLesClubs();
            include("vues/v_clubs.php");
        }else{
            include ("vues/v_ajouterclub.php");
        }
        break;
    }
    case 'ModifierClub':
    {
        $idc = $_REQUEST['club'];
        if(isset($_REQUEST['nom']) && (isset($_REQUEST['ville']) && (isset($_REQUEST['nomdirigeant']) && (isset($_REQUEST['prenomdirigeant']))))){
            $nom = $_REQUEST['nom'];
            $ville = $_REQUEST['ville'];
            $nomdirigeant = $_REQUEST['nomdirigeant'];
            $prenomdirigeant = $_REQUEST['prenomdirigeant'];
            $pdo->modifierclub ($idc, $nom, $ville, $nomdirigeant, $prenomdirigeant);
            $LesClubs = $pdo->getLesClubs();
            include ("vues/v_clubs.php");
        }else{
            $LeClub = $pdo->getFicheClub ($idc);
            $nom= $LeClub[0]['nom'];
            $ville = $LeClub[0]['ville'];
            $nomdirigeant = $LeClub[0]['nomdirigeant'];
            $prenomdirigeant = $LeClub[0]['prenomdirigeant'];
            include("vues/v_modifierclub.php");
        }
        break;
    }
   case 'SupprimerClub' :
   {
       $idc = $_REQUEST['idc'];
       $pdo->SupprimerClub($idc);
       $LesClubs = $pdo->getLesClubs();
       include ("vues/v_clubs.php");
       break;
   }

   case 'AjouterJoueur':
   {
       if(isset($_REQUEST['nom']) && (isset($_REQUEST['prenom']) && (isset($_REQUEST['idcat'])  && (isset($_REQUEST['idc']) && (isset($_REQUEST['nlicence'])&& (isset($_REQUEST['datenaiss']))))))){
           $nom = $_REQUEST['nom'];
           $prenom = $_REQUEST['prenom'];
           $datenaiss = $_REQUEST['datenaiss'];
           $idcat = $_REQUEST['idcat'];
           $nlicence =$_REQUEST['nlicence'];
           $idc = $_REQUEST['idc'];
           $pdo->ajouterjoueur ($nom, $prenom, $datenaiss, $nlicence, $idc, $idcat);
           $lesJoueurs = $pdo->getLesJoueurs();
           $LesCategories = $pdo->getLesCategories();
           include("vues/v_joueurs.php");
       }else{
           $LesCategories = $pdo->getLesCategories();
           $LesClubs = $pdo->getLesClubs();
           include ("vues/v_ajouterjoueur.php");
       }
       break;
   }
    case 'ModifierJoueur':
    {
        $idj = $_REQUEST['idjoueur'];
        if(isset($_REQUEST['nom']) && (isset($_REQUEST['prenom']) && (isset($_REQUEST['datenaiss']) && (isset($_REQUEST['nlicence']))))){
            $nom = $_REQUEST['nom'];
            $prenom = $_REQUEST['prenom'];
            $datenaiss = $_REQUEST['datenaiss'];
            $nlicence = $_REQUEST['nlicence'];
            $idcat = $_REQUEST['idcat'];
            $idc = $_REQUEST['idc'];
            $pdo->modifierjoueur ($idj, $nom, $prenom, $datenaiss, $nlicence, $idcat, $idc);
            $LeJoueur = $pdo->getFicheJoueur($idj);
            $Historique = $pdo->getHistorique($idj);
            include ("vues/v_joueurfiche.php");
        }else{
            $unJoueur = $pdo->getFicheJoueur($idj);
            $nom = $unJoueur[0]['nom'];
            $prenom = $unJoueur[0]['prenom'];
            $idcat = $unJoueur[0]['idcat'];
            $datenaiss = $unJoueur[0]['datenaiss'];
            $nlicence = $unJoueur[0]['nlicence'];
            $oldidc = $unJoueur[0]['idc'];
            $LesClubs = $pdo->getLesClubs();
            include("vues/v_modifierjoueur.php");
            break;
        }
        break;
    }
    case 'FicheClub':
    {
        $idc = $_REQUEST['club'];
        $LeClub = $pdo->getFicheClub($idc);
        include("vues/v_clubfiche.php");
        break;
    }
    case 'FicheJoueur':
    {
        $idjoueur = $_REQUEST['idjoueur'];
        $LeJoueur = $pdo->getFicheJoueur($idjoueur);
        $Historique = $pdo->getHistorique($idjoueur);
        include("vues/v_joueurfiche.php");
        break;
    }
    case 'accueil':
    {
        include("vues/v_accueil.php");
        break;
    }

}