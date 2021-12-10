<?php
    class Item{
        private $Id=null;
        private $Prix=null;
        private $Nom=null;
        private $Quantite=null;
        private $Link=null;
        private $Id_commande=null;

        function __construct($Id, $Prix, $Quantite,$Link,$Nom,$Id_commande){
            $this->Id=$Id;
            $this->Prix=$Prix;
            $this->Quantite=$Quantite;
            $this->Link=$Link;
            $this->Nom=$Nom;
            $this->Id_commande=$Id_commande;
        }
        function getId(){
            return $this->Id;
        }
        function getPrix(){
            return $this->Prix;
        }
        function getQuantite(){
            return $this->Quantite;
        }
        function getLink(){
            return $this->Link;
        }
        function getNom(){
            return $this->Nom;
        }
        function getId_commande(){
            return $this->Id_commande;
        }
        function setId(string $Id){
            $this->Id=$Id;
        }
        function setPrix(string $Prix){
            $this->Prix=$Prix;
        }
        function setQuantite(string $Quantite){
            $this->Quantite=$Quantite;
        }
        function setLink(string $Link){
            $this->Link=$Link;
        }
        function setNom(string $Nom){
            $this->Nom=$Nom;
        }
        function setId_commande($Id_commande){
            $this->Id_commande=$Id_commande;
        }
    }

    class Commande{
        private $Id_commande=null;
        private $Id_utlisateur=null;
        private $date=null;
        private $activeactive=null;

        function __construct($Id_commande, $Id_utlisateur){
            $this->Id_commande=$Id_commande;
            $this->Id_utlisateur=$Id_utlisateur;
        }
        function getId_utlisateur(){
            return $this->Id_utlisateur;
        }
        function getId_commande(){
            return $this->Id_commande;
        }
        function getdate(){
            return $this->date;
        }
        function getactive(){
            return $this->active;
        }
        function setId_utlisateur(int $Id_utlisateur){
            $this->Id_utlisateur=$Id_utlisateur;
        }
        function setId_commande(string $Id_commande){
            $this->Id_commande=$Id_commande;
        }
        function setdate(date $date){
            $this->date=$date;
        }
        function setactive(int $active){
            $this->active=$active;
        }
       
    }


?>