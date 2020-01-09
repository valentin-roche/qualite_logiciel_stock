<?php
class ConnexionBDD {
    private static $pdo;
    public static function getConnection(){
        if (ConnexionBDD::$pdo) return ConnexionBDD::$pdo;
        $connectStatement = SGBD.':dbname='.NOM_BD.';host='.NOM_HOTE_BD.";charset=utf8";
        ConnexionBDD::$pdo = new PDO($connectStatement, NOM_USAGER_BD, MDP_USAGER_BD);
        return ConnexionBDD::$pdo;
    }
}