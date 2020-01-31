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
      $db = ConnectBDD::getConnection();

      $req = $db->prepare('SELECT * FROM utilisateur WHERE mail = :mail');
      $req->bindValue(':mail', $mail);

      $req->execute();

      $data = $req->fetch(PDO::FETCH_ASSOC);
      $ret = new User();
      $ret->create($data['idUtilisateur'], $data['mdp'], $data['nom'], $data['prenom'], $data['mail'], $data['idRayon'], $data['idRole']);
      return $ret;
    }

    //TODO
    public static function checkConnection($mail, $password) {
      $db = ConnectBDD::getConnection();

      $req = $db->prepare('SELECT mail, mdp FROM utilisateur WHERE mail=:mail AND mdp=:mdp');
      $req->bindValue(':mail', $mail);
      $req->bindValue(':mdp',new User()->cryptPass($password));
      $req->execute();
      $count = count($req->fetch(PDO::FETCH_ASSOC));
      if($count > 1){
        return true;
      }
      return false;
    }
}
