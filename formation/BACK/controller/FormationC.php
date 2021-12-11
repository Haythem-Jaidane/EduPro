<?php

    include_once "../../config.php";
    class formationC{
        function afficherFormation(){
            $sql="SELECT * FROM formation";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMeesage());
            }
        }

        function ajouterFormation($formation){
            $sql="INSERT INTO formation (nom_formation, niveau_formation, type_de_ressource, nom_utilisateur, code_formation ) 
			VALUES (:nom_formation,:niveau_formation,:type_de_ressource,:nom_utilisateur, :code_formation )";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
				   'nom_formation' =>$formation->getNom_formation() , 
                   'niveau_formation' =>$formation->getNiveau_formation(),
                   'type_de_ressource' =>$formation->getType_de_ressource(),
                   'nom_utilisateur' =>$formation->getNom_utilisateur(),
                   'code_formation' =>$formation->getCode_formation(),
                  

                
				]);	
                
                

                
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}


		function supprimer_fICHIER($code_formation){
			$sql="DELETE FROM fichier WHERE code_formation=:code_formation";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':code_formation', $code_formation);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
        }



        function supprimer_formation($code_formation){
			$sql="DELETE FROM formation WHERE code_formation=:code_formation";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':code_formation', $code_formation);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
        }

        function trier_formation()
		{
			$sql = "SELECT * from formation ORDER BY niveau_formation DESC";
			$db = config::getConnexion();
			try {
				$req = $db->query($sql);
				return $req;
			} 
			catch (Exception $e)
			 {
				die('Erreur: ' . $e->getMessage());
			}
		}


    }
?>