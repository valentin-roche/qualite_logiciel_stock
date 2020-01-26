<?php
include header.php;
displayHeader("Resultats de la recherche", "");
require_once CONTROLLER_SEARCH;
require_once MODEL_ARTICLE;
require_once DAO_ARTICLE;

function displaySearchResults($results) {
?>
  <h2><?php count($results) ?> Résultats</h2>
  <?php
  foreach ($results as $article) {
  ?>
    <h3><?php echo $article->getName(); ?></h3>
    <p><?php echo $article->getDescription(); ?></p>
    <p><?php echo DAORayon::getPrice($article->getId()); ?></p>
  <?php
  }
}

function displayErr() {
  ?>
  <h2>Aucun résultat</h2>
  <?php
}
 ?>
