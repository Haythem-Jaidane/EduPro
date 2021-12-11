<?php
    class formation{
       
        private $nom_formation=null;
        private $niveau_formation=null;
        private $type_de_ressource=null;
        private $nom_utilisateur=null;
        
  
        function __construct($nom_formation, $niveau_formation, $type_de_ressource, $nom_utilisateur ,$code_formation){
           
            $this->nom_formation=$nom_formation;
            $this->niveau_formation=$niveau_formation;
            $this->type_de_ressource=$type_de_ressource;
            $this->nom_utilisateur=$nom_utilisateur;
            $this->code_formation=$code_formation;

            
            
           
        }
       
        function getNom_formation(){
            return $this->nom_formation;
        }
        function getNiveau_formation(){
            return $this->niveau_formation;
        }
        function getType_de_ressource(){
            return $this->type_de_ressource;
        }
       
        function getNom_utilisateur(){
            return $this->nom_utilisateur;
        }

        function getCode_formation(){
            return $this->code_formation;
        }
        




        function setNom_formation(string $nom_formation){
            $this->nom_formation=$nom_formation;
        }
        function setNiveau_formation(string $niveau_formation){
            $this->niveau_formation=$niveau_formation;
        }
        function setType_de_ressource(string $type_de_ressource){
            $this->type_de_ressource=$type_de_ressource;
        }
       

        function setNom_utilisateur(string $nom_utilisateur){
            $this->nom_utilisateur=$nom_utilisateur;
        }


        function setCode_formation(string $code_formation){
            $this->code_formation=$code_formation;
        }

      
       
    }


?>