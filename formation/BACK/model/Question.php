<?php
    class question{
       
        private $nom=null;
        private $prenom=null;
        private $question=null;
        private $nom_utilisateur=null;
        private $id_question=null;
        
  
        function __construct($nom, $prenom, $question, $nom_utilisateur, $id_question){
           
            $this->nom=$nom;
            $this->prenom=$prenom;
            $this->question=$question;
            $this->nom_utilisateur=$nom_utilisateur;
            $this->id_question=$id_question;
            
           
        }
       
        function getNom(){
            return $this->nom;
        }
        function getPrenom(){
            return $this->prenom;
        }
        function getQuestion(){
            return $this->question;
        }
        function getNom_utilisateur(){
            return $this->nom_utilisateur;
        }
        function getId_question(){
            return $this->id_question;
        }




        function setNom(string $nom){
            $this->nom=$nom;
        }
        function setPrenom(string $prenom){
            $this->prenom=$prenom;
        }
        function setQuestion(string $question){
            $this->question=$question;
        }
        function setNom_utilisateur(string $nom_utilisateur){
            $this->nom_utilisateur=$nom_utilisateur;
        }

        function setId_question(string $id_question){
            $this->id_question=$id_question;
        }

      
       
    }


?>