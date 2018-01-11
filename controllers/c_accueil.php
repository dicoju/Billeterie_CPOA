<?php


if (isset($_POST["20"])){
    $date = 20;
}
elseif (isset($_POST["21"])){
    $date = 21;
}
elseif (isset($_POST["22"])){
    $date = 22;
}
elseif (isset($_POST["23"])){
    $date = 23;
}
elseif (isset($_POST["24"])){
    $date = 24;
}
elseif (isset($_POST["25"])){
    $date = 25;
}
elseif (isset($_POST["26"])){
    $date = 26;
}



if (isset($date)){
    $page = "billet";
    header('Location: index.php?page='.$page.'&date='.$date);
}
elseif(isset($erreur)) // affichage des erreurs
{
    header('Location: index.php?nom='.$nom.'&message='.$erreur);
    exit();
}
else
{
    // affichage des photos
    require_once(PATH_VIEWS.$page.'.php');
}





