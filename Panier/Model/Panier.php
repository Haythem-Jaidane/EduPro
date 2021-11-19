<?php
    class Item{
        private $Id=null;
        private $Prix=null;
        private $Nom=null;
        private $Quantite=null;
        private $Link=null;

        function __construct($Id, $Prix, $Quantite,$Link,$Nom){
            $this->Id=$Id;
            $this->Prix=$Prix;
            $this->Quantite=$Quantite;
            $this->Link=$Link;
            $this->Nom=$Nom;
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
       
    }

    class Pannier{
        private $Numbre_Produit=null;
        private $Prix=null;

        function __construct($Numbre_Produit, $Prix, $Quantite){
            $this->Numbre_Produit=$Numbre_Produit;
            $this->Prix=$Prix;
        }
        function getNumbreProduit(){
            return $this->Numbre_Produit;
        }
        function getPrix(){
            return $this->Prix;
        }
        function setNumbreProduit(string $Numbre_Produit){
            $this->Numbre_Produit=$Numbre_Produit;
        }
        function setPrix(string $Prix){
            $this->Prix=$Prix;
        }
       
    }


?>