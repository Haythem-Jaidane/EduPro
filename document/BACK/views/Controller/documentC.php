<?php

include_once 'Model/document.php';
include_once '../config.php';

class documentC
{
    function afficherdocument()
    {
        $sql = "SELECT Titre , Description, Type as idCategorie FROM document D inner join categorie C on C.idCategorie = D.idCategorie ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMeesage());
        }
    }

    function supprimerdocument($Titre)
    {
        $sql = "DELETE FROM document WHERE Titre=:Titre";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':Titre', $Titre);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMeesage());
        }
    }

    function ajouterdocument($document)
    {
        $sql = "INSERT INTO document (Titre,Description,idCategorie) 
			VALUES (:Titre,:Description,:idCategorie)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'Titre' => $document->getTitre(),
                'Description' => $document->getDescription(),
                'idCategorie' => $document->getIdCategorie(),
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function recupererdocument($Titre)
    {
        $sql = "SELECT * from document where Titre=:Titre";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'Titre' => $Titre
            ]);

            $document = $query->fetch();
            return new document(
                $document["Titre"],
                $document["Description"],
                $document["idCategorie"]
            );
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function recupererdocumentParCategorie($categorie)
    {
        $sql = "SELECT * from document where idCategorie=:idCategorie";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idCategorie' => $categorie
            ]);

            $document = $query->fetch();
            return new document(
                $document["Titre"],
                $document["Description"],
                $document["idCategorie"]
            );
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierdocument($document)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE document SET 
						idCategorie= :idCategorie, 
						Description= :Description
						
					WHERE Titre= :Titre'
            );
            $query->execute([
                'idCategorie' => $document->getIdCategorie(),
                'Description' => $document->getDescription(),
                'Titre' =>  $document->getTitre()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

}
?>