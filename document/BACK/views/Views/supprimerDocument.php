<?php

include '../Controller/documentC.php';
$documentC = new documentC();
$documentC->supprimerdocument($_GET["Titre"]);
header('Location:../Views/afficherDocuments.php');
?>
