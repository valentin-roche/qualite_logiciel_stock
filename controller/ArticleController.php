<?php
require_once MODEL_ARTICLE;
require_once DAO_ARTICLE;

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
      displayAddForm();
      break;
  }
}

//After the form has been submitted
if($formAction and isset($_POST["name"])) {
  switch ($formAction) {
    case 'addArticle':
      if (addArticle($_POST["name"], $_POST["desc"])) {
        echo "Succès";
      } else {
        echo "Echec";
      }
      break;
    case 'modifyArticle':
      echo "TODO";
      break;
  }
}

function addArticle($name, $desc) {
  $article = new Article();
  $article->createSimple($name, $desc);
  return DAOArticle::addArticle($article);
}
