<?php include(PATH_VIEWS.'menu.php'); ?>
<?php require_once(PATH_VIEWS.'header.php');?>

    <!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>


    <h1> Billet </h1>

    <p> date : <?= $date ?></p>



    <div class="row">
        <div class="col-sm-6">
            <form>
                <div class="form-group">
                    <label for="mail">Mail</label>
                    <input type="email" class="form-control" id="mail" name="mail" placeholder="Mail">

                </div>
                <div class="form-group">
                    <label for="nbPlaces">Nombre de places</label>
                    <input type="number" max="6" class="form-control" id="nbPlaces" name="nbPlaces" placeholder="Nombre de places">
                </div>
                <div class="form-group">
                    <label for="categorie">Catégorie</label>
                    <select class="form-control" id="categorie" name="categorie">
                        <?php
                        foreach ($tabCats as $key){
                            ?>
                            <option value="<?= $key->getNumEmplacement(); ?>">
                                <?= $key->getNomEmplacement();?>
                                <?= $key->getPrixCalc() . "€"; ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="codePromo">Code promotionnel</label>
                    <input type="text" class="form-control" id="codePromo" name="codePromo" placeholder="Code promotionnel">
                    <button type="button" class="btn btn-dark btn-sm" id="validerCodePromo">Appliquer</button>
                </div>

                <br>

                <input type="submit" class="btn btn-primary" name="btn_valider" value="Je réserve mes places">
            </form>
        </div>

        <div class="col-sm-6">
            <img src="<?= PATH_IMAGES . "placement.jpg"?>" alt="Placement différentes catégories" width="100%">
        </div>

    </div>


    <script>
        var tabCats = [];
        var tabCodes = [];
        var prixInitial = <?= PRIX_INITIAL ?>;

        <?php
        foreach ($tabCats as $key){
            $id = $key->getNumEmplacement();
            $varPrix = $key->getVariationPrixEmplacement();
            ?> tabCats.push(new Cat(<?= $id ?>, <?= $varPrix ?>)); <?php
        }

        foreach ($tabCodes as $key){
            $val = $key->getValeurCode();
            $varPrix = $key->getVariationPrix();
            ?> tabCodes.push(new CodePromo("<?= $val ?>", <?= $varPrix ?>)); <?php
        }
        ?>

        $("#nbPlaces").change(function () {
            var nbPLaces = this.value;
            prixTotal = prixInitial*nbPLaces;

        });

        $("#categorie").change(function () {
            var categorie = this.value;
            //console.log(tabCats.id.indexOf(categorie));
        });

        $("#validerCodePromo").click(function () {
            var codePromo = $("#codePromo").val();
        });



        function Cat(id, varPrix) {
            this.id = id;
            this.varPrix = varPrix;
        }
        function CodePromo(val, varPrix) {
            this.val = val;
            this.varPrix = varPrix;
        }
    </script>


    <!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');
