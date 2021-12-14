<?php
class categorie
{
    private $idCategorie = null;
    private $Type = null;

    function __construct($idCategorie , $Type)
    {
        $this->idCategorie = $idCategorie ;
        $this->Type = $Type;
    }
    function getidCategorie ()
    {
        return $this->idCategorie ;
    }

    function getType()
    {
        return $this->Type;
    }

    function setidCategorie (string $idCategorie )
    {
        $this->idCategorie  = $idCategorie ;
    }

    function setType(string $Type)
    {
        $this->Type = $Type;
    }
}
