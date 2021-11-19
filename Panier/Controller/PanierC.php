<?php

    include "../config.php";
    class ItemC{
        function afficherItem(){
            $sql="SELECT * FROM produit";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMeesage());
            }
        }

		function supprimeradherent($Id){
			$sql="DELETE FROM produit WHERE ID=:Id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':Id', $Id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

        function ajouterItem($Item){
            $sql="INSERT INTO produit (ID,image_link,Nom,Prix,Quantite) 
			VALUES (:Id,:image_link,:Nom,:Prix,:Quantite)";
			$db = config::getConnexion();
			try{
				echo("test");
				$query = $db->prepare($sql);
				echo("test");
				$query->execute([
					'Id' => $Item->getId(),
					'image_link' => $Item->getLink(),
					'Nom' => $Item->getNom(),
					'Prix' => $Item->getPrix(),
					'Quantite' => $Item->getQuantite()
				]);			
				echo("test");
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

		
		function recupererItem($Id){
			$sql="SELECT * from produit where ID=$Id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$adherent=$query->fetch();
				return $adherent;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierItem($Item, $Id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE adherent SET 
						image_link = :Link(),
						Nom = :Nom(),
						Prix = :Prix(),
						Quantite = :Quantite(),
					WHERE ID= :Id'
				);
				$query->execute([
					'image_link' => $Item->getLink(),
					'Nom' => $Item->getNom(),
					'Prix' => $Item->getPrix(),
					'Quantite' => $Item->getQuantite(),
					'ID' => $Id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
    }
?>