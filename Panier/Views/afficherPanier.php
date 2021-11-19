<?php
    include "../Controller/PanierC.php";
    
    $Produit = new ItemC();
    $resultat=$Produit->afficherItem();
    echo"<table style='margin:5%'>";
    echo"<tr>";
    echo"<th></th>";
    echo"<th>Nom de l'article</th>";
    echo"<th>Quantité</th>";
    echo"<th>Rrix D'un Article</th>";
    echo"<th>Prix Total</th>";
    echo"</tr>";
    foreach($resultat as $i){
        echo"<tr style='width: 80%;margin:10%;'>";
        echo"<td style='width: 25%;'><img src=".$i['image_link']."></td>";
        echo"<td>".$i['Nom']."</td>";
        echo"<td>".$i['Quantite']."</td>";
        echo"<td>".$i['Prix']."</td>";
        echo"<td>".$i['Quantite']*$i['Prix']."</td>";
        echo"<td><button onclick= ".$Produit->supprimeradherent($i['ID']).";>Supprimer</button></td>";
        echo"<td><a href='modifierPanier.php'>Modifier</a></td>";
        echo"<tr>";
    }
    echo"</table>";
?>
