<?php

$date = htmlspecialchars($_GET['date']);

if (isset($_POST['mail'])){
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['date'] = $date;
    $_SESSION['nbPlaces'] = $_POST['nbPlaces'];
    $_SESSION['categorie'] = $_POST['categorie'];
    $page = 'recap';

    header('Location: index.php?page='.$page.'&date='.$date);

}



require_once(PATH_MODELS . 'CategoriePlaceDAO.php');

$catDAO = new CategoriePlaceDAO();
$tabCats = $catDAO->getAll();


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



require_once(PATH_MODELS . 'CodePromoDAO.php');

$codeDAO = new CodePromoDAO();
$tabCodes = $codeDAO->getAll();


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
    // affichage des photos
    require_once(PATH_VIEWS.$page.'.php');
}

