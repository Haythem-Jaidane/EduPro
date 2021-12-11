<?php
    class reclamation{
       
        private $nom=null;
        private $prenom=null;
        private $nomUtilisateur=null;
        private $email=null;
        private $id_utilisateur=null;
       
       
        function __construct($nom, $prenom, $nomUtilisateur, $email, $id_utilisateur){
           
            $this->nom=$nom;
            $this->prenom=$prenom;
            $this->nomUtilisateur=$nomUtilisateur;
            $this->email=$email;
            $this->id_utilisateur=$id_utilisateur;
        }
       
        function getNom(){
            return $this->nom;
        }
        function getPrenom(){
            return $this->prenom;
        }
        function getNomUtilisateur(){
            return $this->nomUtilisateur;
        }
        function getEmail(){
            return $this->email;
        }
        function getId_utilisateur(){
            return $this->id_utilisateur;
        }

      

        function getExplication(){
            return $this->explication;
        }
        function setNom(string $nom){
            $this->nom=$nom;
        }
        function setPrenom(string $prenom){
            $this->prenom=$prenom;
        }
        function setNomUtilisateur(string $nomUtilisateur){
            $this->nomUtilisateur=$nomUtilisateur;
        }
        function setEmail(string $email){
            $this->email=$email;
        }

        function setId_utilisateur(string $id_utilisateur){
            $this->id_utilisateur=$id_utilisateur;
        }

       
      
       
    }


?>