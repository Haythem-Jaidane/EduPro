<?php

    include "../config.php";
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
            $sql="INSERT INTO formation (nom_formation, niveau_formation, type_de_ressource, fichier, nom_utilisateur ) 
			VALUES (:nom_formation,:niveau_formation,:type_de_ressource,:fichier,:nom_utilisateur )";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
				   'nom_formation' =>$formation->getNom_formation() , 
                   'niveau_formation' =>$formation->getNiveau_formation(),
                   'type_de_ressource' =>$formation->getType_de_ressource(),
                   'fichier' =>$formation->getFichier(),
                   'nom_utilisateur' =>$formation->getNom_utilisateur(),
                  

                
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
    }
?>