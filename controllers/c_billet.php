<?php
/*

5 terrains

1 : 5600 : 50% cat 1 -- 30% cat 2 -- 20 % cat3
2 : 2800 : 50% cat 1 -- 30% cat 2 -- 20 % cat3
3 : 1000 : seulement cat 1
4 : 1000 : seulement cat 1
5 : 1000 : seulement cat 1


pour une journée, on peut vendre


cat 1 : cat 1 terrain 1 et 2 + toutes les places sur les autres
cat 2 : cat 2 sur terrain 1 et 2
cat 3 : cat 3 sur terrain 1 et 2



Pour une journée :

on vend 80% de toutes les cat 2 ((5600*0,3+2800*0,3) * 0,8)
on vend 80% de toutes les cat 3 ((5600*0,2+2800*0,2) * 0,8)
on vend 60% de toutes les cat 1 ((5600*0,5+2800*0,5+1000*3) * 0,6)
 */


$date = htmlspecialchars($_GET['date']);

if (isset($_POST['mail'])){
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['date'] = $date;
    $_SESSION['nbPlaces'] = $_POST['nbPlaces'];
    $_SESSION['categorie'] = $_POST['categorie'];
    $page = 'recap';

    header('Location: index.php?page='.$page.'&date='.$date);

}


require_once(PATH_MODELS . 'CodePromoDAO.php');
require_once(PATH_MODELS . 'CategoriePlaceDAO.php');
require_once(PATH_MODELS . 'CourtDAO.php');

$catDAO = new CategoriePlaceDAO();
$tabCats = $catDAO->getAll();

$codeDAO = new CodePromoDAO();
$tabCodes = $codeDAO->getAll();

$courtDAO = new CourtDAO();
$tabCourts = $courtDAO->getAll();


$repartitionPlacesCat = array();
foreach ($tabCats as $cat){
    $repartitionPlacesCat[] = $cat->getNbPlaces()/100;
}

$nbPlacesCourts = array();
foreach ($tabCourts as $court){
    $nbPlacesCourts[] = $court->getNbPlaces();
}

$nbPlacesCat2 = $repartitionPlacesCat[1]*$nbPlacesCourts[0]+$repartitionPlacesCat[1]*$nbPlacesCourts[1];
$nbPlacesCat3 = $repartitionPlacesCat[2]*$nbPlacesCourts[0]+$repartitionPlacesCat[2]*$nbPlacesCourts[1];
$nbPlacesCat1 = $repartitionPlacesCat[0]*$nbPlacesCourts[0]+$repartitionPlacesCat[0]*$nbPlacesCourts[1];


for ($i = 2; $i < count($nbPlacesCourts); $i++){
    $nbPlacesCat1 += $nbPlacesCourts[$i];
}

$nbPlacesByCats = array($nbPlacesCat1, $nbPlacesCat2,$nbPlacesCat3);

/*
 * Pour la cat 1 : on autorise la vente de 60% des places
 * Pour la cat 2 : on autorise la vente de 80% des places
 * Pour la cat 3 : on autorise la vente de 80% des places
 */

require_once(PATH_MODELS . 'BilletDAO.php');
$billetDAO = new BilletDAO();
$nbPlacesVendus = array();
$nbPlacesVendus[0] = count($billetDAO->getByDateAndEmplacement($date,1));
$nbPlacesVendus[1] = count($billetDAO->getByDateAndEmplacement($date,2));
$nbPlacesVendus[2] = count($billetDAO->getByDateAndEmplacement($date,3));

//var_dump($billetDAO->getErreur());

$nbPlacesVenteAutorisees = array();

$nbPlacesVenteAutorisees[0] = $nbPlacesByCats[0]*0.6;
$nbPlacesVenteAutorisees[1] = $nbPlacesByCats[1]*0.8;
$nbPlacesVenteAutorisees[2] = $nbPlacesByCats[2]*0.8;

$catDispo = array();


$nbPlacesVendus[0] = 4320;
for ($i = 0; $i<3; $i++){

    if (($nbPlacesVenteAutorisees[$i] - $nbPlacesVendus[$i]) > 0){
        $catDispo[$i] = 1;
    }
    else{
        $catDispo[$i] = 0;
    }



}
var_dump($catDispo[0]);
echo $nbPlacesVenteAutorisees[0] . " - " . $nbPlacesVendus[0]. "</br>";

var_dump($catDispo[1]);
echo $nbPlacesVenteAutorisees[1] . " - " . $nbPlacesVendus[1]. "</br>";

var_dump($catDispo[2]);
echo $nbPlacesVenteAutorisees[2] . " - " . $nbPlacesVendus[2]. "</br>";



// On regarde s'il y a des erreurs
if(is_null($tabCats))
{
    if(!is_null($tabCats->getErreur()))
    {
        $erreur = 'query';
        if(DEBUG)
            die($catDAO->getErreur());
    }
    else
        $erreur = 'autre';
}
else{
    foreach ($tabCats as $key){
        $varPrix = $key->getVariationPrixEmplacement();
        $prixCalc = PRIX_INITIAL * (1+($varPrix/100));
        $key->setPrixCalc($prixCalc);
    }
}


// On regarde s'il y a des erreurs
if(is_null($tabCodes))
{
    if(!is_null($tabCodes->getErreur()))
    {
        $erreur = 'query';
        if(DEBUG)
            die($codeDAO->getErreur());
    }
    else
        $erreur = 'autre';
}



if(isset($erreur)) // affichage des erreurs
{
    header('Location: index.php?page='.$page.'&erreur='.$erreur);
    exit();
}
else {
    // affichage de la vue
    require_once(PATH_VIEWS.$page.'.php');
}

