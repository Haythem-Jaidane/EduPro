<?php
    include_once '../Model/Panier.php';
    include_once '../Controller/PanierC.php';

    $error = "";

    // create adherent
    $Item = null;

    // create an instance of the controller
    $ItemC = new ItemC();
    if (
        isset($_POST["Id"]) &&
        isset($_POST["Prix"]) &&       
        isset($_POST["Nom"]) &&
        isset($_POST["Quantite"]) &&
        isset($_POST["Link"])
    ) {
        if (
            !empty($_POST["Id"]) &&
            !empty($_POST['Prix']) &&
            !empty($_POST["Nom"]) &&
            !empty($_POST["Quantite"]) &&
            !empty($_POST["Link"])
        ) {
            $adherent = new Adherent(
                $_POST['Id'],
                $_POST['Prix'],
                $_POST['Nom'],
                $_POST['Quantite'],
                $_POST['Link']
            );
            $adherentC->ajouterAdhérent($adherent);
            header('Location:afficherPanier.php');
        }
        else
            $error = "Missing information";
    }  
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherPanier.php">Retour à la liste des adherents</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['Id'])){
				$Item = $ItemC->recupereradherent($_POST['Id']);
				
		?>
        
        <form action="" method="POST">
        <table border="1" align="center">
                <tr>
                    <td>
                        <label for="ID">ID:
                        </label>
                    </td>
                    <td><input type="text" name="ID" id="ID" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Prix">Prix:
                        </label>
                    </td>
                    <td><input type="number" name="nom" id="nom"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Quantite">Quantite:
                        </label>
                    </td>
                    <td><input type="number" name="Quantite" id="Quantite" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Prix">Prix:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="Prix" id="Prix">
                    </td>
                </tr>             
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer">
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
    </body>
</html>