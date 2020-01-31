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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
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

    function cryptPass($pwd) {
      $encrypt_method = "AES-256-CBC";
      $secret_key = 'e9058ab198f6908f702111b0c0fb5b36f99d00554521886c40e2891b349dc7a1';
      $secret_iv = '17550e2bb9ff2c26dcce8ed178e326202cc9c67f16b79470767f01839a062249';

      // hash
      $key = hash('sha256', $secret_key);

      //iv encryption
      $iv = substr(hash('sha256', $secret_iv), 0, 16);

      $output = openssl_encrypt($password, $encrypt_method, $key, 0, $iv);
      $output = base64_encode($output);
      return $output;
    }

    function decryptPass($pwd) {
      $encrypt_method = "AES-256-CBC";
      $secret_key = 'e9058ab198f6908f702111b0c0fb5b36f99d00554521886c40e2891b349dc7a1';
      $secret_iv = '17550e2bb9ff2c26dcce8ed178e326202cc9c67f16b79470767f01839a062249';

      // hash
      $key = hash('sha256', $secret_key);

      //iv encryption
      $iv = substr(hash('sha256', $secret_iv), 0, 16);

      $output = openssl_decrypt(base64_decode($password), $encrypt_method, $key, 0, $iv);
      return $output;
    }
}
