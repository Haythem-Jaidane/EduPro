<?php

    include "../config.php";
    class ItemC{
        function afficherItem($Id){
            $sql="SELECT * FROM produit WHERE id_commande = ".$Id."";
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
				'UPDATE produit SET 
				  Quantite = :Quantite
				WHERE ID= :Id'
			  );
			  $query->execute([
				'Id' => $Item->getId(),
				'Quantite' => $Item->getQuantite(),
			  ]);
			} catch (PDOException $e) {
			  $e->getMessage();
			}
		}

		function Sub($Item){
			try {
			  $Item->setQuantite($Item->getQuantite()-1);
			  $db = config::getConnexion();
			  $query = $db->prepare(
				'UPDATE produit SET 
				  Quantite = :Quantite
				WHERE ID= :Id'
			  );
			  $query->execute([
				'Id' => $Item->getId(),
				'Quantite' => $Item->getQuantite()
			  ]);
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
			$sql="SELECT * FROM commande WHERE ".$id_utilisateur." and active=1";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

		function CalculerMontant($id_commande){
			$sql="SELECT sum(Prix*Quantite) as SOMME FROM produit where id_commande = ".$id_commande."";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
				$liste = $liste->fetch();
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMeesage());
            }
		}

		function AjouterCommande($User_id){
			$sql="INSERT INTO commande (id_commande,id_utlisateur,date_commande,active) 
			VALUES (:Id,:ID_usr,:date_,:active)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);

				$query->execute([
					'Id' => rand(1,100000),
					'ID_usr' => $User_id,
					'date_' => NULL,
					'active' => 0
				]);			

			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
		}

		function afficherCommandeAdmin(){
			$sql="SELECT * FROM commande WHERE active=1";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

		function finaliser_commande($Id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
				  'UPDATE commande SET 
				    date_commande = NOW(),
					active = 1
				  WHERE id_commande= :Id'
				);
				$query->execute([
				  'Id' => $Id
				]);
			  } catch (PDOException $e) {
				$e->getMessage();
			  }
		}

		function IdNonActive($user){
			$sql="SELECT * FROM commande WHERE active=0 and id_utlisateur=".$user."";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				$liste = $liste->fetch();
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

		function DetailCommande($id_commande){
			$sql="SELECT * FROM produit WHERE id_commande=".$id_commande."";
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