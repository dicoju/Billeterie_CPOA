<?php

/*
 * Page ajax
 * Dans le répertoire controller car besoin d'utiliser les DAO
 */



// On ajoute le billet en base de données
require_once(PATH_MODELS . 'BilletDAO.php');


$mail = $_SESSION['mail'];
$date = $_SESSION['date'];
$nbPlaces = $_SESSION['nbPlaces'];
$cat = $_SESSION['categorie'];
$codePromo = $_SESSION['codePromo'];
$montant = $_SESSION['montant'];


$billetDAO = new BilletDAO();
$billetDAO->create($montant, $codePromo, $date, $mail, $cat);

$erreur = $billetDAO->getErreur();
if (is_null($erreur)){
    echo "Votre commande a bien été prise en compte";
}
else{
    echo "Erreur";
}