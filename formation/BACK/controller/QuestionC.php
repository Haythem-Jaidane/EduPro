<?php

    include_once "../../config.php";
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
            
            $sql="INSERT INTO question (nom, prenom, question, nom_utilisateur, id_question ) 
			VALUES (:nom, :prenom, :question, :nom_utilisateur, :id_question)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
				   'nom' =>$question->getNom() , 
                   'prenom' =>$question->getPrenom(),
                   'question' =>$question->getQuestion(),
                   'nom_utilisateur' =>$question->getNom_utilisateur(),
                   'id_question' =>$question->getId_question(),
                  

                
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

        function supprimer_question($id_question){
			$sql="DELETE FROM question WHERE id_question=:id_question";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_question', $id_question);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
        }
    }
?>