<?php require_once(PATH_VIEWS.'header.php');?>


<?php include(PATH_VIEWS.'menu.php'); ?>

    <!--  Zone message d'alerte -->
    <?php require_once(PATH_VIEWS.'alert.php');?>


    <h1> <?= MENU_REGISTER ?> </h1>



<!-- Formulaire pour l'inscription -->


<form method="post">
    <div class="form-group">
        <label> Pseudo </label>
        <br>
        <input type="text" name="userName" placeholder="pseudo">
    </div>


    <div class="form-group">
        <label> Mot de passe </label>
        <br>
        <input type="password" name="userPassword" placeholder="Mot de passe">
    </div>

    <div class="form-group">
        <label> Confirmation du mot de passe </label>
        <br>
        <input type="password" name="userPasswordVerify" placeholder="Vérification du mot de passe">
    </div>

    <div class="form-group">
        <label> Email </label>
        <br>
        <input type="text" name="userEmail" placeholder="Email">
    </div>

    <input class="btn btn-primary" type="submit" name="btonSubmit" value="Inscription">
</form>


    <!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');
