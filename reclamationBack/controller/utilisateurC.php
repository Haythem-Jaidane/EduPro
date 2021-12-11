<?php

    include_once "../../config.php";
    class utilisateurC{
        function afficherutilisateur(){
            $sql="SELECT * FROM utilisateur";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMeesage());
            }
        }

        function ajouterutilisateur($utilisateur){
            $sql="INSERT INTO utilisateur (nom, prenom, nomUtilisateur, email, id_utilisateur) 
			VALUES (:nom,:prenom,:nomUtilisateur,:email,:id_utilisateur )";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
				   'nom' =>$utilisateur->getNom() , 
                   'prenom' =>$utilisateur->getPrenom(),
                   'nomUtilisateur' =>$utilisateur->getNomUtilisateur(),
                   'email' =>$utilisateur->getEmail(),
                   'id_utilisateur' =>$utilisateur->getid_utilisateur(),
                   

                
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
    }
?>