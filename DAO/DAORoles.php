<?php
require_once MODEL_ROLE;
require_once CONNECTBDD;

/**
 * Data Access Object for Roles
 */
class DAORoles
{
  function __construct() {}

  public static function getRoles() {
    $db = ConnectBDD::getConnection();

    $req = $db->prepare('SELECT * FROM role');

    $req->execute();
    $role_list = [];
    $roleDataList = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach ($roleDataList as $roleData) {
        echo $roleData;
        $role = new Role();
        $role->create($roleData['idRole'], $roleData['libelle']);
        $role_list[] = $role;
    }
    return $role_list;
  }

}

 ?>
