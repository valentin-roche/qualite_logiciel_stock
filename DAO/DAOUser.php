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
    public static function getUserByMail($mail) {
      $db = ConnectBDD::getConnection();

      $req = $db->prepare('SELECT * FROM utilisateur WHERE mail = :mail');
      $req->bindValue(':mail', $mail);

      $req->execute();

      $data = $req->fetch(PDO::FETCH_ASSOC);
      $ret = new User();
      $ret->create($data['idUtilisateur'], $data['mdp'], $data['nom'], $data['prenom'], $data['mail'], $data['idRole']);
      return $ret;
    }

    public static function checkConnection($mail, $password) {
      $db = ConnectBDD::getConnection();

      $req = $db->prepare('SELECT mail, mdp FROM utilisateur WHERE mail=:mail AND mdp=:mdp');
      $req->bindValue(':mail', $mail);
      $nusr = new User();
      $pwd = $nusr->cryptPass($password);
      $req->bindValue(':mdp', $pwd);
      $req->execute();
      $count = count($req->fetch(PDO::FETCH_ASSOC));
      if($count > 1){
        return true;
      }
      return false;
    }

    public static function addUser(User $usr) {
      $db = ConnectBDD::getConnection();

      $req = $db->prepare("INSERT INTO utilisateur(mdp, nom, prenom, mail, idRole) VALUES (:mdp, :nom, :prenom, :mail, :idRole)");
      $req->bindValue(':mdp', $usr->cryptPass($usr->getPasswd()));
      $req->bindValue(':nom', $usr->getName());
      $req->bindValue(':prenom', $usr->getsurname());
      $req->bindValue(':mail', $usr->getMail());
      $req->bindValue(':idRole', $usr->getIdRole());

      $req->execute();
      $last_id = $db->lastInsertId();
      $usr->setId($last_id);
      return $last_id;
    }
}
