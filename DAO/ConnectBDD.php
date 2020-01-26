<?php
class ConnectBDD {
    private static $pdo;
    public static function getConnection(){
        if (ConnectBDD::$pdo) return ConnectBDD::$pdo;
        $connectStatement = SGBD.':dbname='.NOM_BD.';host='.NOM_HOTE_BD.";charset=utf8";
        ConnectBDD::$pdo = new PDO($connectStatement, NOM_USAGER_BD, MDP_USAGER_BD);
        return ConnectBDD::$pdo;
    }
}
