<?php
require_once CONNECTBDD;
require_once MODEL_USER;

class DAOUser
{
    function __construct(){}

    //TODO
    static function getRole($user_id)
    {
        return 0;
    }

    //TODO
    static function getRayon($user_id)
    {
        return 0;
    }

    //TODO
    public static function getUserByMail($mail) {
      $bdd = ConnectBDD::getConnection();

      $req = $bdd->prepare('SELECT * FROM utilisateur WHERE mail = :mail');
      $req->bindValue(':mail', $mail);

      $req->execute();

      $data = $req->fetch(PDO::FETCH_ASSOC);
      $ret = new User();
      $ret->create();
      return $ret;
    }

    //TODO
    public static function checkConnection($login, $password) {

    }
}
