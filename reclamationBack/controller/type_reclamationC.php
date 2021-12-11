<?php

    include_once "../../config.php";
    class typeReclamationC{
        function affichertypeReclamation(){
            $sql="SELECT * FROM type_reclamation";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMeesage());
            }
        }

        function ajouterTypeReclamation($typeReclamation){
            $sql="INSERT INTO type_reclamation (libelle_typeReclamation) 
			VALUES (:libelle_typeReclamation)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
				   'libelle_typeReclamation' =>$typeReclamation->getLibelle_typeReclamation() , 
                  

                
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
    }
?>