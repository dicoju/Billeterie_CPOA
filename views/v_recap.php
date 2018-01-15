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
if ($codePromo != "null"){
    echo "Code promotionnel : " . $codePromo . "</br>";
}

echo "Prix Unitaire : " . $montantUnitaire . "€" . "</br>";
echo "</br>";
echo "Montant total : " . $montant . "€" ."</br>";


?>

<br>
<button type="button" class="btn btn-success" id="btn_payer">
    Payer
</button>


<script>
    $("#btn_payer").click(function () {
        $.ajax({
            url : 'index.php?page=saveBillet',
            error : function(){
                alert('Erreur ajax enregistrement billet');
            },
            success : function(retour){
                alert(retour);
            }
        });
    });
</script>
    <!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');
