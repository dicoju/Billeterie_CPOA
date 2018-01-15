<?php
session_start();
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 15/01/2018
 * Time: 08:40
 */



if (isset($_POST['varPrixCat'])){
    $_SESSION['varPrixCat'] = $_POST['varPrixCat'];
}

if (isset($_POST['varPrixCode'])){
    $_SESSION['varPrixCodePromo'] = $_POST['varPrixCode'];
}

if (isset($_POST['montant'])){
    $_SESSION['montant'] = $_POST['montant'];
}

if (isset($_POST['codePromo'])){
    $_SESSION['codePromo'] = $_POST['codePromo'];
}

