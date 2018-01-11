<?php
/*
 * TP PHP
 * Vue menu
 *
 * Copyright 2016, Eric Dufour
 * http://techfacile.fr
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 *
 * menu: http://www.w3schools.com/bootstrap/bootstrap_ref_comp_navs.asp
 */
?>
<!-- Menu du site -->

<?php
if (isset($_SESSION['userName'])){
    // MENU connecté
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li <?php echo ($page=='index' ? 'class="active"':'')?>>
    <a href="index.php">
        <?= MENU_ACCUEIL ?>
    </a>
    </li>

    <ul class="nav navbar-nav navbar-right">
        <li <?php echo ($page=='logout' ? 'class="active"':'')?>>
            <a href="index.php?page=logout">
                <?= MENU_LOGOUT ?>
            </a>
        </li>
    </ul>
    </div>
    </nav>


<?php


}

else{
    // Menu Non Connecté

?>
    <nav class="navbar navbar-dark bg-dark">

        <ul class="nav navbar-nav">
            <li <?php echo ($page=='index' ? 'class="active"':'')?>>
                <a href="index.php">
                    <?= MENU_ACCUEIL ?>
                </a>
            </li>
        </ul>

    </nav>




<?php
}
?>




<!-- Vue -->
<section class="container">



