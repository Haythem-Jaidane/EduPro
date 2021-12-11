<?php

    include_once "../config.php";
    class questionC{
        function afficherQuestion(){
            $sql="SELECT * FROM question";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMeesage());
            }
        }

        function ajouterQuestion($question){
            
            $sql="INSERT INTO question (nom, prenom, question, nom_utilisateur ) 
			VALUES (:nom, :prenom, :question, :nom_utilisateur)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
				   'nom' =>$question->getNom() , 
                   'prenom' =>$question->getPrenom(),
                   'question' =>$question->getQuestion(),
                   'nom_utilisateur' =>$question->getNom_utilisateur(),
                  

                
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
    }
?>