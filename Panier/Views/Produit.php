
<?php
                include_once '../Model/Panier.php';
                include_once '../Controller/PanierC.php';

                $Item = new Item(
                    2,
                    10,
                    2,
                    "assets/images/web.jpg",
                    "Web"
                );

                $ItemC = new ItemC();

                $ItemC->ajouterItem($Item);
            
        ?>