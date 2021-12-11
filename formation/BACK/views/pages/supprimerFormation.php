<?php
require_once '../../config.php'; 
	include_once '../../controller/FormationC.php';
 
	try{
		$code_formation=$_GET['code_formation'];
		$servname = "localhost"; $dbname = "projet"; $user = "root"; $pass = "root";
		$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
		$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	
		
		$req = $dbco->prepare("DELETE FROM fichier WHERE code_formation = $code_formation");
		$req->bindParam(':code_formation', $code_formation, PDO::PARAM_INT);
		$req->execute();
		echo 'Données supprimées';
	}
		  
	catch(PDOException $e){
		echo "Erreur : " . $e->getMessage();
	}

	$formationC=new formationC();
	$formationC->supprimer_formation($_GET["code_formation"]);
	header('Location:formationBack.php');
?>   

