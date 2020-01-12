<?php
require_once MODEL_ARTICLE;
require_once DAO_ARTICLE;
require_once DAO_RAYON;

if(isset($_POST['formAction'])) $formAction = $_POST['formAction'];
if(isset($_GET['navAction'])) $formNav = $_GET['navAction'];

//Select which form to display
if(isset($formNav)) {
  switch ($formNav) {
    case 'addArticle':
      $formAction = 'addArticle';
      displayAddForm();
      break;
    case 'modifyArticle':
      $formAction = 'modifyArticle';
      displayModForm();
      break;
  }
}

//After the form has been submitted
if($formAction and isset($_POST["name"])) {
  switch ($formAction) {
    case 'addArticle':
      $id = addArticle($_POST["name"], $_POST["desc"], $_POST["rayon"], $_POST["quantity"], $_POST["price"]);
      if (isset($id)) {
        header('Location: http://qualite-logiciel-stock/article.php?idArticle='.$id);
        exit();
      } else {
        echo "Echec";
      }
      break;
    case 'modifyArticle':
      echo "TODO";
      break;
  }
}

function addArticle($name, $desc, $idRayon, $qtt, $price) {
  $article = new Article();
  $article->createSimple($name, $desc);
  $idArticle = DAOArticle::addArticle($article);
  DAORayon::addArticle($qtt, $price, $idArticle, $idRayon);
  return $idArticle;
}
