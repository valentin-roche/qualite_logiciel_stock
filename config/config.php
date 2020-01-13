<?php
error_reporting( E_ALL );
ini_set('display_errors', 1);

define("SGBD", "mysql");
define("NOM_BD", "decathlux");
define("NOM_HOTE_BD", "localhost");
define("NOM_USAGER_BD", "root");
define("MDP_USAGER_BD", "");

define("DAO_USER", "DAO/DAOUser.php");
define("MODEL_USER", "model/User.php");
//define("CONTROLLER_USER", "controller/UserController.php");

define("DAO_ARTICLE", "DAO/DAOArticle.php");
define("MODEL_ARTICLE", "model/Article.php");
define("CONTROLLER_ARTICLE", "controller/ArticleController.php");

define("DAO_RAYON", "DAO/DAORayon.php");
define("MODEL_RAYON", "model/Rayon.php");
//define("CONTROLLER_RAYON", "controller/RayonController.php");

define("CONNECTBDD", "DAO/ConnectBDD.php");
define("CONTROLLER_SEARCH", 'controller/SearchController.php');


//$dsn = 'mysql:dbname=;host=lookingpywroot.mysql.db';
//$user = 'siteLeoPub';
//$password = 'looking4partyAdmin';

//define("CONTROLEUR_CONNEXION", $prefixePrive."controleur/controleurConnexion.php");
?>
