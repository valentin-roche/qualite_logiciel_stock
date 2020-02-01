<?php
include "header.php";
displayHeader("Ajouter utilisateur", "");
require_once MODEL_USER;
require_once CONTROLLER_USER;

function displayAddForm() {
  if(isset($_POST["nom"])) {
    $formAction = 'modifyUser';
  } else {
    $formAction = 'addUser';
  }
?>
<form method="POST" id="formArticle">
  <input type="text" name="name" value="<?php if(isset($_POST["name"])) echo $_POST["name"] ?>">
  <input type="text" name="surname" value="<?php if(isset($_POST["surname"])) echo $_POST["surname"] ?>">
  <input type="email" name="email" value="<?php if(isse($_POST["email"])) echo $_POST["email"] ?>">
  <input type="password" name="password" value="<?php if(isset($_POST["password"])) echo $_POST["password"] ?>">

  <label for="rayon">Rayon :</label>
  <select name="rayon">
    <?php
    foreach (DAORayon::getRayons() as $rData) {
    ?>
    <option value="<?php echo $rData->getId(); ?>"><?php echo $rData->getName(); ?></option>
    <?php }
    ?>
  </select>

  <label for="role">Role :</label>
  <select name="role">
    <?php
    foreach (DAORoles::getRoles() as $rData) {
    ?>
    <option value="<?php echo $rData->getId(); ?>"><?php echo $rData->getName(); ?></option>
    <?php }
    ?>
  </select>
  <input type="submit" name="" value="">
