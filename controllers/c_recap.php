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


