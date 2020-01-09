<?php
include "header.php";
afficherEntete("Ajouter article", "");
require_once MODEL_ARTICLE;
require_once CONTROLLER_ARTICLE;
$article = null;

function displayAddForm() {
  if(isset($_POST["nom"])) {
    $formAction = 'modifyArticle';
  } else {
    $formAction = 'addArticle';
  }
?>
<form method="POST" id="formArticle">
  <input type="text" name="name" placeholder="Nom de l'article" value="<?php if(isset($_POST["nom"])) echo $_POST["nom"] ?>">
  <input type="text" name="desc" placeholder="Description de l'article" value="<?php if(isset($_POST["description"])) echo $_POST["description"] ?>">
  <input type="submit" value="Ajouter l'article" name="<?php echo $formAction?>"/>
</form>
