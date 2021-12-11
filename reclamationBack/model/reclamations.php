<?php
    class reclamations{
       
      
        private $nomUtilisateur=null;
        private $typer=null;
        private $explication=null;
  
        function __construct( $nomUtilisateur,  $typer,  $explication , $statut){
           
            
            $this->nomUtilisateur=$nomUtilisateur;
            $this->typer=$typer;
            $this->explication=$explication;
            $this->statut=$statut;
           
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

        function getStatut(){
            return $this->statut;
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
      
        function setStatut(string $statut){
            $this->statut=$statut;
        }
       
    }


?>