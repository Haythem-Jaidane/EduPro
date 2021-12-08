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
            $Item = new Item(
                $_POST['Id'],
                $_POST['Prix'],
                $_POST['Quantite'],
                $_POST['Link'],
                $_POST['Nom'],
                4
            );
            echo "test";
            $ItemC->ajouterItem($Item);
            echo "test";
            echo "done";
            header('Location:tables.php');
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
        <button><a href="tables.php">Retour à la liste des adherents</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="ID">ID:</label>
                    </td>
                    <td><input type="number" name="Id" id="Id" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="Nom" id="Nom"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Link">Link:
                        </label>
                    </td>
                    <td><input type="text" name="Link" id="Link"></td>
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
                        <label for="Prix">Prix:</label>
                    </td>
                    <td>
                        <input type="number" name="Prix" id="Prix">
                    </td>
                </tr>             
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Ajouter' >  
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>