<?php
include "../Controller/PanierC.php";

$Produit = new CommandeC();

$id=$Produit->IdNonActive(20)["id_commande"];

$Produit->finaliser_commande($id);
$Produit->AjouterCommande(20);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Thank you for buying some think</p>
    <?php echo'<a href="facture.php?id='.$id.'">Voir la Facture</a>';?>
</body>
</html>