
<?php

$mail = $_SESSION['mail'];
$date = $_SESSION['date'];
$nbPlaces = $_SESSION['nbPlaces'];
$cat = $_SESSION['categorie'];
$varPrixCat = $_SESSION['varPrixCat'];
$codePromo = $_SESSION['codePromo'];
$varPrixCode = $_SESSION['varPrixCodePromo'];
$montant = $_SESSION['montant'];

require_once (PATH_MODELS . 'CategoriePlaceDAO.php');
$catPlaceDAO = new CategoriePlaceDAO();
$categorie = $catPlaceDAO->get($cat);
$nomCat = $categorie->getNomEmplacement();

$montantUnitaire = $montant/$nbPlaces;

require_once(PATH_VIEWS.$page.'.php');


