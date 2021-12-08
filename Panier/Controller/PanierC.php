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

		function supprimerItem($Id){
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
            $sql="INSERT INTO produit (ID,image_link,Nom,Prix,Quantite,id_commande) 
			VALUES (:Id,:image_link,:Nom,:Prix,:Quantite,:Id_commande)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);

				$query->execute([
					'Id' => $Item->getId(),
					'image_link' => $Item->getLink(),
					'Nom' => $Item->getNom(),
					'Prix' => $Item->getPrix(),
					'Quantite' => $Item->getQuantite(),
					'Id_commande' => $Item->getId_commande()
				]);			

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
						id_commande = :Id_commande 
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

		function length(){
			$sql="SELECT * from produit";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$adherent=$query->fetchall();
				return count($adherent);

			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function Add($Item){
			try {
			  $Item->setQuantite($Item->getQuantite()+1);
			  $db = config::getConnexion();
			  $query = $db->prepare(
				'UPDATE adherent SET 
				  image_link = :Link,
				  Nom = :Nom,
				  Prix = :Prix,
				  Quantite = :Quantite,
				  id_commande = :Id_commande 
				WHERE ID= :Id'
			  );
			  $query->execute([
				'image_link' => $Item->getLink(),
				'Nom' => $Item->getNom(),
				'Prix' => $Item->getPrix(),
				'Quantite' => $Item->getQuantite(),
				'ID' => $Item->getId()
			  ]);
			  echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
			  $e->getMessage();
			}
		}

		function Sub($Item){
			try {
			  $db = config::getConnexion();
			  echo "1";
			  $query = $db->prepare(
				'UPDATE adherent SET 
				  image_link = :Link(),
				  Nom = :Nom(),
				  Prix = :Prix(),
				  Quantite = :Quantite(),
				  id_commande = :Id_commande 
				WHERE ID= :Id'
			  );
			  echo "2";
			  $query->execute([
				'ID' => $Item->getId(),
				'image_link' => $Item->getLink(),
				'Nom' => $Item->getNom(),
				'Prix' => $Item->getPrix(),
				'Quantite' => $Item->getQuantite()-1,
				'id_commande' => $Item->getId_commande()
			  ]);
			  echo "3";
			  echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
			  $e->getMessage();
			}
		}
    }

	class CommandeC{
		function afficherCommande(){
			$sql="SELECT * FROM commande";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

		function afficherCommandeUtilisateur($id_utilisateur){
			$sql="SELECT * FROM commande WHERE ".$id_utilisateur."";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

		function CalculerMontant(){
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
	}
?>