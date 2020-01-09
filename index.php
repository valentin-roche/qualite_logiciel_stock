<?php
require_once "model/ArticleStub.php";
require_once "model/RayonStub.php";
require "model/UserStub.php";
include "header.php";

afficherHeader("Accueil", "");

var_dump(new ArticleStub());
var_dump(new RayonStub());
var_dump(new UserStub());
?>

<a href="addArticle.php?navAction=addArticle">Ajouter un article</a>

<?php
include "footer.php";
afficherFooter();
?>
