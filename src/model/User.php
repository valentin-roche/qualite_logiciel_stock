<?php

require_once "../DAO/DAOUser.php";

class User
{
    private $id;
    private $identifiant;
    private $passwd;
    private $nom;
    private $prenom;
    private $mail;
    private $idRole;
    private $idRayon;

    /**
     * User constructor.
     * @param $id
     * @param $identifiant
     * @param $passwd
     * @param $nom
     * @param $prenom
     * @param $mail
     */
    public function __construct($id, $identifiant, $passwd, $nom, $prenom, $mail)
    {
        $this->id = $id;
        $this->identifiant = $identifiant;
        $this->passwd = $passwd;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->idRole = DAOUser::getRole($id);
        $this->idRayon = DAOUser::getRayon($id);
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
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    /**
     * @param mixed $identifiant
     */
    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;
    }

    /**
     * @return mixed
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * @param mixed $passwd
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;
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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getIdRole()
    {
        return $this->idRole;
    }

    /**
     * @param string $idRole
     */
    public function setIdRole($idRole)
    {
        $this->idRole = $idRole;
    }

    /**
     * @return string
     */
    public function getIdRayon()
    {
        return $this->idRayon;
    }

    /**
     * @param string $idRayon
     */
    public function setIdRayon($idRayon)
    {
        $this->idRayon = $idRayon;
    }
}