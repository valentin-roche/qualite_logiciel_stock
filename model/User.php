<?php

class User
{
    private $id;
    private $passwd;
    private $name;
    private $surname;
    private $mail;
    private $idRole;
    private $idRayon;

    public function __construct() {}

    /**
     * User instantiator.
     * @param $id
     * @param $identifiant
     * @param $passwd
     * @param $name
     * @param $surname
     * @param $mail
     */
    public function create($id, $passwd, $name, $surname, $mail, $roleId, $idRayon)
    {
        $this->id = $id;
        $this->passwd = $passwd;
        $this->name = $name;
        $this->surname = $surname;
        $this->mail = $mail;
        $this->idRole = $roleId
        $this->idRayon = $idRayon;
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
    public function getname()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setname($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getsurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setsurname($surname)
    {
        $this->surname = $surname;
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
