<?php
require_once '../Controller/categorieC.php';
$categorieC = new categorieC();
$categories = $categorieC->afficherCategorie();
if (isset($_POST['categorie'])$$ isset($_POST['search'])){
    $list = $categorieC->afficherDocuments($_POST['categorie']);
}
?>
// ...
<div class="form-container">
    <form action="" method ="POST">
        <div class="row">
            <div class="col-25">
                <label>Search: </label>
            </div>
            <div class="col-75">
                <select name="categorie" id="categorie">
                    <?php
                    foreach ($categories as $categorie){
                        ?>
                    <option
                        value="<?= $categorie['idCategorie']?>"
                        <?php } ?>

                    >
                    <?= $categorie['idCategorie'] ?>
                    </option>
                    <?php
                    }
                    ?>

                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <input type="submit" value="Search" name= "search">
        </div>
    </form>
</div>
