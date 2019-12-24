<?php


class Rayon
{
    private $id;
    private $nom;
    private $respo;

    /**
     * Rayon constructor.
     * @param $id
     * @param $nom
     * @param $respo
     */
    public function __construct($id, $nom, $respo)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->respo = $respo;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getRespo()
    {
        return $this->respo;
    }

    /**
     * @param mixed $respo
     */
    public function setRespo($respo)
    {
        $this->respo = $respo;
    }

}