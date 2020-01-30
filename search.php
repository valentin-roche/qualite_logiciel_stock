<?php
require_once "header.php";
displayHeader("Resultats de la recherche", "");
require_once CONTROLLER_SEARCH;
require_once MODEL_ARTICLE;
require_once DAO_ARTICLE;

function displaySearchResults($results) {
?>
  <h2><?php echo count($results) ?> Résultat(s)</h2>
  <?php
  foreach ($results as $article) {
  ?>
    <h3>
      <a href="article.php?idArticle=<?php echo $article->getId();?>">
        <?php echo $article->getName(); ?>
      </a>
    </h3>
    <p><?php echo $article->getDescription(); ?></p>
    <p><?php echo DAOArticle::getPrice($article->getId()); ?></p>
  <?php
  }
}

function displayErr() {
  ?>
  <h2>Aucun résultat</h2>
  <?php
}
 ?>
