<?php
include_once '../Model/categorie.php';
include_once '../config.php';
class categorieC
{
    function affichercategorie()
    {
        $sql = "SELECT * FROM categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMeesage());
        }
    }

    function supprimercategorie($idCategorie)
    {
        $sql = "DELETE FROM categorie WHERE idCategorie=:idCategorie";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idCategorie', $idCategorie);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMeesage());
        }
    }

    function ajoutercategorie($type)
    {
        $sql = "INSERT INTO categorie (Type) VALUES (:Type)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'Type' => $type,
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function recuperercategorie($idCategorie)
    {
        $sql = "SELECT * from categorie where idCategorie=:idCategorie";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idCategorie' => $idCategorie
            ]);

            $categorie= $query->fetch();
            return $categorie;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifiercategorie($categorie, $idCategorie)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE categorie SET 
						idCategorie= :idCategorie, 
						Type= :Type
						
					WHERE idCategorie= :idC'
            );
            $query->execute([
                'idCategorie' => $categorie->getidCategorie(),
                'Type' => $categorie->getType(),
                'idC' => $idCategorie
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function afficherDocument($idCategorie){
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM document where idCategorie = :id'
            );
            $query->execute([
                'id'->$idCategorie
                ]);
            return $query->fetchAll();
            } catch (PDOException $e){
            $e->getMessage();
        }
    }


}
