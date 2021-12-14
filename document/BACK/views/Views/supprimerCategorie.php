<?php
include '../Controller/categorieC.php';
$categorieC = new categorieC();
$categorieC->supprimercategorie($_GET["idCategorie"]);
header('Location:../Views/afficherCategorie.php');
?>