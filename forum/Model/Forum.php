<?php
    class forum{
       
        private $nom_utilisateur=null;
        private $email=null;
        private $sujet=null;
        private $messageF=null;
        
     
        
  
        function __construct($nom_utilisateur, $email, $sujet, $messageF){
           
            $this->nom_utilisateur=$nom_utilisateur;
            $this->email=$email;
            $this->sujet=$sujet;
            $this->messageF=$messageF;
            
            
            
           
        }
       
        function getNom_utilisateur(){
            return $this->nom_utilisateur;
        }
        function getEmail(){
            return $this->email;
        }
        function getSujet(){
            return $this->sujet;
        }
        function getMessageF(){
            return $this->messageF;
        }
        



        function setNom_utilisateur(string $nom_utilisateur){
            $this->nom_utilisateur=$nom_utilisateur;
        }
        function setEmail(string $email){
            $this->email=$email;
        }
        function setSujet(string $sujet){
            $this->sujet=$sujet;
        }
        function setMessageF(string $messageF){
            $this->messageF=$messageF;
        }
        
       
    }


?>