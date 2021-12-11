<?php

    include "../config.php";
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
            $sql="INSERT INTO reclamations ( nomUtilisateur, typer, explication ) 
			VALUES (:nomUtilisateur,:typer, :explication )";
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
  
   

    $erreur = 'Erreur: '.$e->getMessage();
    $erreurnom = 'Erreur: SQLSTATE[23000]: Integrity constraint violation: 1452 Cannot add or update a child row: a foreign key constraint fails (`bibliothéque`.`reclamations`, CONSTRAINT `reclamations_ibfk_2` FOREIGN KEY (`nomUtilisateur`) REFERENCES `utilisateur` (`nomUtilisateur`))' ;
    
    if      (strcmp(   $erreur , $erreurnom ) == 0) {
        
        $alert = "nom d'utilisateur inexistant" ;
        function alert ($alert)
                    {
    
                      
                        echo '<script type="text/javascript">'; 
echo "alert(\"$alert\");"; 
echo 'window.location.href = "ajouterReclamations.php";';
echo '</script>';

                    }
                    alert($alert)  ; 



                    

    
    }

    if ($valid) { $pdo = config::getConnexion();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE formation SET  code_formation = ?, nom_formation = ?, niveau_formation = ?, type_de_ressource = ?,  nom_utilisateur = ?,  WHERE code_formation = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array( $code_formation, $nom_formation, $niveau_formation ,$type_de_ressource, $nom_utilisateur ));

        config::disconnect();
        header("Location: formationBack.php");
        
    }

    if (empty($nom)) { $nomError = 'Please enter nom'; $valid = false; } if (empty($prenom)) { $prenomError = 'Please enter your name'; $valid = false; } if (empty($nomUtilisateur)) { $nomUtilisateurError = 'Please enter nomUtilisateur$nomUtilisateur'; $valid = false; } if (empty($email)) { $emailError = 'Please enter Email Address'; $valid = false; } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $emailError = 'Please enter a valid Email Address'; $valid = false; }    if (empty($typer)) { $typerError = 'Please enter a description'; $valid = false; } if  (!isset($explication)){ $explicationError = 'Please enter website explication'; $valid = false; } 


    if ($valid) {
        $pdo = config::getConnexion() ;
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
      $sql = " UPDATE utilisateur  Set nom = ? , prenom = ? , nomUtilisateur = ? , email = ? where nomUtilisateur ='$nomUtilisateur'";
      $q = $pdo->prepare($sql);
      $q->execute(array($nom , $prenom , $nomUtilisateur , $email));
      $info = $q->fetch(PDO::FETCH_ASSOC);
      config::disconnect();
    
    
    }



  
    
    }			
    }
    }
    
    
    
    ?>
    
<script>
   function Ereur()
   {

    
   }
    </script>

