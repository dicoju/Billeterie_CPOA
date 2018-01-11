<?php include(PATH_VIEWS.'menu.php'); ?>
<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>


<h1> Bienvenue dans la billeterie du tournoi open de Lyon</h1>



<!-- Dates du tournoi : dimanche 20 mai 2018 -> samedi 26 mai 2018 -->
<br>
<br>
<form method="post">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">1er tour</h5>
                    <p class="card-text">Dimanche 20 mai 2018</p>
                    <input type="submit" class="btn btn-primary" value="Je réserve ma place" name="20">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">1er tour</h5>
                    <p class="card-text">Lundi 21 mai 2018</p>
                    <input type="submit" class="btn btn-primary" value="Je réserve ma place" name="21">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">1/8 de finale</h5>
                    <p class="card-text">Mardi 22 mai 2018</p>
                    <input type="submit" class="btn btn-primary" value="Je réserve ma place" name="22">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">1/8 de finale</h5>
                    <p class="card-text">Mercredi 23 mai 2018</p>
                    <input type="submit" class="btn btn-primary" value="Je réserve ma place" name="23">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">1/4 de finale</h5>
                    <p class="card-text">Jeudi 24 mai 2018</p>
                    <input type="submit" class="btn btn-primary" value="Je réserve ma place" name="24">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">1/2 finale</h5>
                    <p class="card-text">Vendredi 25 mai 2018</p>
                    <input type="submit" class="btn btn-primary" value="Je réserve ma place" name="25">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body finale">
                    <h5 class="card-title">Finale</h5>
                    <p class="card-text">Samedi 26 mai 2018</p>
                    <input type="submit" class="btn btn-primary" value="Je réserve ma place" name="26">
                </div>
            </div>
        </div>
    </div>
</form>





<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
