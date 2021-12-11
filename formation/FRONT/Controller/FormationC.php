<?php

    include_once "../config.php";
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

            $sql="INSERT INTO formation (nom_formation, niveau_formation, type_de_ressource, nom_utilisateur, code_formation) 
			VALUES (:nom_formation,:niveau_formation,:type_de_ressource,:nom_utilisateur ,:code_formation)";
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
        


        function supprimer_formation($nom_utilisateur){
			$sql="DELETE FROM formation WHERE nom_utilisateur=:nom_utilisateur";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':nom_utilisateur', $nom_utilisateur);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
        }



    }
?>