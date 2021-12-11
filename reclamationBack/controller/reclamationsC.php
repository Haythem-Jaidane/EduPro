

<?php

    include "../../config.php";
    class reclamationsC{
        function afficherReclamations(){
            $sql="SELECT * FROM reclamations";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMeesage());
            }
        }

        function ajouterReclamations($reclamations){
            $sql="INSERT INTO reclamations ( nomUtilisateur, typer, explication , statut) 
			VALUES (:nomUtilisateur,:typer, :explication ,:statut)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
				   
                   'nomUtilisateur' =>$reclamations->getNomUtilisateur(),
                   
                   'typer' =>$reclamations->getTyper(),
                   'explication' =>$reclamations->getExplication(),
                  

                
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
    }
?>