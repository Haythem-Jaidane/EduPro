<?php
	include '../Controller/PanierC.php';
	$ItemC=new ItemC();
	$ItemC->supprimeradherent($_GET["Id"]);
	header('Location:afficherPanier.php');
?>