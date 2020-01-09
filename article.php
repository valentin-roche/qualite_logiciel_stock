<?php
include './config/config.php';
include "header.php";
require_once DAO_ARTICLE;

if(isset($_GET["idArticle"])) $idArticle = $_GET["idArticle"];

$article = null;
afficherHeader("Article", "");

if($idArticle)
{
    $article = DAOArticle::getArticle($idArticle);
    ?>
    <h2><?php echo $article->getName() ?></h2>
    <p><?php echo $article->getDescription() ?></p>
    <?php
}
else {
    ?>
    <h2>Article non trouvé</h2>
    <?php
}
include "footer.php";
?>
