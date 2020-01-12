<?php
include "header.php";
require_once DAO_ARTICLE;

if(isset($_GET["idArticle"])) $id = $_GET["idArticle"];

$article = null;
displayHeader("Article", "");


if(isset($id))
{
    $article = DAOArticle::getArticle($id);
    ?>
    <h2><?php echo $article->getName(); ?></h2>
    <p><?php echo $article->getDescription(); ?></p>
    <p>Quantité : <? echo DAOArticle::getQuantity($article) ?></p>
    <?php
}
else {
    ?>
    <h2>Article non trouvé</h2>
    <?php
}
include "footer.php";
?>
