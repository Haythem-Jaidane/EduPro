<?php
    class typeReclamation{
       
        private $libelle_typeReclamation=null;
        
       
        function __construct($libelle_typeReclamation){
           
            $this->libelle_typeReclamation=$libelle_typeReclamation;
           
        }
       
        function getLibelle_typeReclamation(){
            return $this->libelle_typeReclamation;
        }
        
        function setLibelle_typeReclamation(string $libelle_typeReclamation){
            $this->libelle_typeReclamation=$libelle_typeReclamation;
        }
       
       
    }


?>