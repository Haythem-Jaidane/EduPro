<?php
    class reclamations{
       
      
        private $nomUtilisateur=null;
        private $typer=null;
        private $explication=null;
  
        function __construct( $nomUtilisateur,  $typer,  $explication){
           
            
            $this->nomUtilisateur=$nomUtilisateur;
            $this->typer=$typer;
            $this->explication=$explication;
           
        }
       
        function getNomUtilisateur(){
            return $this->nomUtilisateur;
        }
       
        function getTyper(){
            return $this->typer;
        }


        function getExplication(){
            return $this->explication;
        }



        
        function setNomUtilisateur(string $nomUtilisateur){
            $this->nomUtilisateur=$nomUtilisateur;
        }
        

        function setTyper(string $typer){
            $this->Typer=$typer;
        }

       
        function setExplication(string $explication){
            $this->explication=$explication;
        }
      
       
    }


?>