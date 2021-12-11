<?php
include "../config.php";
require_once '../Model/User2.php';

class UserC
{
    function ajouterUser($User)
	{
		$sql = "INSERT INTO Utilisateur (nom, prenom, email, password) 
			VALUES (:nom,:prenom,:email, :password)";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute([
				'nom' => $User->getNom(),
				'prenom' => $User->getPrenom(),
				'email' => $User->getEmail(),
				'password' => $User->getPassword()
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}

    function afficherUser()
	{

		$sql = "SELECT * FROM Utilisateur";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
// '%$rech%'

function recherche($rech)
{

	$sql = "SELECT * FROM Utilisateur where nom like '%$rech%' OR prenom like '%$rech%' OR email like '%$rech%' ";
	$db = config::getConnexion();
	try {
		$liste = $db->query($sql);
		return $liste;
	} catch (Exception $e) {
		die('Erreur: ' . $e->getMessage());
	}
}

	function Tri()
	{

		$sql = "SELECT * FROM Utilisateur ORDER BY nom";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

    function supprimerUser($id)
	{
		$sql = "DELETE FROM Utilisateur WHERE id= :id";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id', $id);
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

    function modifierUser($User, $id)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE Utilisateur SET 
						nom = :nom, 
						prenom = :prenom,
						email = :email,
						password = :password
					WHERE id = :id'
			);
			$query->execute([
				'nom' => $User->getNom(),
				'prenom' => $User->getPrenom(),
				'email' => $User->getEmail(),
				'password' => $User->getPassword(),
				'id' => $id
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}

	function recupererUser($id)
	{
        $sql="SELECT * from Utilisateur where id=$id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $reclamation=$query->fetch();
            return $reclamation;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
    function verifUser($id)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE Utilisateur SET                           
						verified = :verified
					WHERE id = :id'
			);
			$query->execute([
				'verified' => 1,
				'id' => $id
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}

}