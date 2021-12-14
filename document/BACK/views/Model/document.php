<?php
class document
{
    private $Titre = null;
    private $Description = null;
    private $idCategorie = null;

    /**
     * @param null $Titre
     * @param null $Description
     * @param null $idCategorie
     */
    public function __construct($Titre, $Description, $idCategorie)
    {
        $this->Titre = $Titre;
        $this->Description = $Description;
        $this->idCategorie = $idCategorie;
    }

    /**
     * @return null
     */
    public function getTitre()
    {
        return $this->Titre;
    }

    /**
     * @param null $Titre
     */
    public function setTitre($Titre)
    {
        $this->Titre = $Titre;
    }

    /**
     * @return null
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param null $Description
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
    }

    /**
     * @return null
     */
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    /**
     * @param null $idCategorie
     */
    public function setIdCategorie($idCategorie)
    {
        $this->idCategorie = $idCategorie;
    }

}
?>