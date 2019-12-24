<?php
require_once "./src/model/ArticleStub.php";
require_once "./src/model/RayonStub.php";
require_once "./src/model/UserStub.php";
include "header.php";

afficherHeader("Accueil", "");

var_dump(new ArticleStub());
var_dump(new RayonStub());
var_dump(new UserStub());
?>

<?php
include "footer.php";
afficherFooter();
?>