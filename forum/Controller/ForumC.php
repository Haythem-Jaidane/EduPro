<?php

    include_once "../config.php";
    class forumC{
        function afficherForum(){
            $sql="SELECT * FROM forum";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMeesage());
            }
        }

        function ajouterForum($forum){
            $sql="INSERT INTO forum (nom_utilisateur , email, sujet, messageF ) 
			VALUES (:nom_utilisateur ,:email,:sujet,:messageF)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
				   'nom_utilisateur' =>$forum->getNom_utilisateur () , 
                   'email' =>$forum->getEmail(),
                   'sujet' =>$forum->getSujet(),
                   'messageF' =>$forum->getMessageF(),
				   
                  

                
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
        function supprimerForum($IDforum){
			$sql= "DELETE FROM `forum` WHERE `forum`.`IDforum` = IDforum";
            
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':IDforum', $IDforum);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
        function recupererForum($nom_utilisateur){
			$sql="SELECT * from forum where nom_utilisateur='$nom_utilisateur'";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Forum=$query->fetch();
				return $Forum;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
        function modifierForum($Forum, $nom_utilisateur){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE forum SET 
						nom_utilisateur=:nom_utilisateur,  
						sujet=:sujet, 
						sujet=:sujet, 
						messageF=:messageF
					WHERE nom_utilisateur=:nom_utilisateur'
				);
				$query->execute([
					'nom_utilisateur' => $Forum->getnom_utilisateur(),
					'email' => $Forum->getEmail(),
					'sujet' => $Forum->getSujet(),
					'messageF' => $Forum->getMessageF(),
					'nom_utilisateur' => $nom_utilisateur
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
    }
?>