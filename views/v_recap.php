<?php include(PATH_VIEWS.'menu.php'); ?>
<?php require_once(PATH_VIEWS.'header.php');?>

    <!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>




    <h1> Recap </h1>

<?php



echo "Date : " . $date . ' Mai 2018' . "</br>";
echo "Email : " . $mail . "</br>";
echo "Nombre de places : " . $nbPlaces . "</br>";
echo "Catégorie : " . $nomCat . "</br>";
echo "Code promotionnel : " . $codePromo . "</br>";
echo "Prix Unitaire : " . $montantUnitaire . "€" . "</br>";
echo "</br>";
echo "Montant total : " . $montant . "€" ."</br>";

?>

    <!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');
