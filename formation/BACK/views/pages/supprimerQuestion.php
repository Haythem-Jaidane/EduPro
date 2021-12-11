<?php
	include '../../controller/QuestionC.php';
	$questionC=new questionC();
	$questionC->supprimer_question($_GET["id_question"]);
	header('Location:formationBack.php');
?>