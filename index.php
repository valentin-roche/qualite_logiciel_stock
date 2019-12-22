<?php
require_once "./src/model/ArticleStub.php";
include "header.php";
afficherHeader("Accueil", "");

var_dump(new ArticleStub());
?>


<?php
include "footer.php";
afficherFooter();
?>