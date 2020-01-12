<?php
include "header.php";
displayHeader("Ajouter article", "");
require_once MODEL_ARTICLE;
require_once CONTROLLER_ARTICLE;
require_once DAO_RAYON;
$article = null;

function displayAddForm() {
  if(isset($_POST["nom"])) {
    $formAction = 'modifyArticle';
  } else {
    $formAction = 'addArticle';
  }
}
?>
<form method="POST" id="formArticle">
  <input type="text" name="name" placeholder="Nom de l'article" value="<?php if(isset($_POST["name"])) echo $_POST["name"] ?>">
  <input type="text" name="desc" placeholder="Description de l'article" value="<?php if(isset($_POST["description"])) echo $_POST["description"] ?>">
  <label for="quantity">Quantité (au moins 1) :</label>
  <input type="number" name="quantity" value="<?php if(isset($_POST["quantity"])) echo $_POST["quantity"] ?>" min="1" >
  <label for="quantity">Prix (au moins 1€) :</label>
  <input type="number" name="price" value="<?php if(isset($_POST["price"])) echo $_POST["price"] ?>" min="1" >
  <label for="rayon">Rayon :</label>
  <select name="rayon">
    <?php
    foreach (DAORayon::getRayons() as $rData) {
    ?>
    <option value="<?php echo $rData->getId(); ?>"><?php echo $rData->getName(); ?></option>
    <?php }
    ?>
  </select>

  <input type="submit" value="Ajouter l'article" name="<?php echo $formAction?>"/>
</form>
