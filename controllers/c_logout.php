<?php
session_start();
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 20/10/2017
 * Time: 14:17
 */

$_SESSION = array();
session_destroy();
$success = "Deconnexion réussie";

header('Location: index.php?page=accueil&success=' . $success);