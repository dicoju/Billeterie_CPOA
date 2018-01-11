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
                    <input type="number" max="6" class="form-control" id="nbPlaces" name="nbPlaces" placeholder="Nombre de places" value="1">
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
                    <label
                            for="codePromo"
                            style="display: block">
                        Code promotionnel
                    </label>

                    <input type="text"
                           class="form-control"
                           id="codePromo" name="codePromo"
                           placeholder="Code promotionnel"
                           style="width: 60%; display: inline-block">

                    <button
                            type="button"
                            class="btn btn-outline-primary"
                            id="validerCodePromo"
                            style="display: inline-block; width: 33.1%; margin-left: 5%; margin-bottom: 6px">
                        Appliquer
                    </button>
                    <small id="backupCode" class="form-text text-muted"></small>
                </div>

                <br>

                <input type="submit" class="btn btn-primary" name="btn_valider" value="Je réserve mes places">
            </form>
            <br>
            <label id="labelMontant"> Montant total : <?= PRIX_INITIAL ?> € </label>
        </div>

        <div class="col-sm-6">
            <img src="<?= PATH_IMAGES . "placement.jpg"?>" alt="Placement différentes catégories" width="100%">
        </div>

    </div>


    <script>
        var tabCats = [];
        var tabCodes = [];
        var prixInitial = <?= PRIX_INITIAL ?>;
        var varPrixCat = 0;
        var varPrixCode = 0;
        var nbPlaces = 1;
        var montant;

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
            nbPlaces = this.value;
            console.log("nbPLaces : " + nbPlaces);
            montant = calculerMontant(prixInitial, nbPlaces, varPrixCat, varPrixCode);
            console.log("Montant : " + montant);
        });

        $("#categorie").change(function () {
            var categorie = this.value;
            varPrixCat = getVarPrixCat(categorie, tabCats);
            console.log("varPrixCategorie : " + varPrixCat);
            if (varPrixCat == -1) varPrixCat = 0;
            montant = calculerMontant(prixInitial, nbPlaces, varPrixCat, varPrixCode);
            console.log("Montant : " + montant);
        });

        $("#validerCodePromo").click(function () {
            var codePromo = $("#codePromo").val();
            varPrixCode = getVarPrixCode(codePromo, tabCodes);
            console.log("varPrixCode : " + varPrixCode);
            if (varPrixCode == -1){
                varPrixCode = 0;
                $("#codePromo").addClass("is-invalid").removeClass("is-valid");
                $("#backupCode").text("Code invalide");
            }
            else{
                $("#codePromo").addClass("is-valid").removeClass("is-invalid");
                $("#backupCode").text("Remise de " + varPrixCode + "%");
            }
            montant = calculerMontant(prixInitial, nbPlaces, varPrixCat, varPrixCode);
            console.log("Montant : " + montant);
        });



        function Cat(id, varPrix) {
            this.id = id;
            this.varPrix = varPrix;
        }
        function CodePromo(val, varPrix) {
            this.val = val;
            this.varPrix = varPrix;
        }

        function getVarPrixCode(valCode, tabCodes){
            var i = 0;
            while (i < tabCodes.length){
                if (tabCodes[i].val === valCode){
                    return tabCodes[i].varPrix;
                }
                i++;
            }
            return -1;
        }
        function getVarPrixCat(idCat, tabCats){
            var i = 0;
            while (i < tabCats.length){
                if (tabCats[i].id == idCat){
                    return tabCats[i].varPrix;
                }
                i++;
            }
            return -1;
        }

        function calculerMontant(prixInitial, nbPlaces, varPrixCat, varPrixCode){
            var montant = prixInitial * (1+(varPrixCat/100));
            montant = montant * (1-(varPrixCode/100));
            montant = montant * nbPlaces;

            $("#labelMontant").text("Montant total : " + montant + "€");

            return montant;
        }
    </script>


    <!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php');
