<?php
require_once "./src/model/ArticleStub.php";
require_once "./src/model/RayonStub.php";
include "header.php";
afficherHeader("Accueil", "");

var_dump(new ArticleStub());
var_dump(new RayonStub());
?>

<?php
include "footer.php";
afficherFooter();
?>