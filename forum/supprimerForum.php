<?php
	include '../Controller/forumC.php';
	$forumC=new forumC();
	$forumC->supprimerForum($_GET["IDforum"]);
	header('Location:afficherForum.php');
?>

