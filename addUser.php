<?php
include "header.php";
displayHeader("Ajouter utilisateur", "");
require_once MODEL_USER;
require_once CONTROLLER_USER;
require_once DAO_ROLE;

function displayAddForm() {
  if(isset($_SESSION["idRole"])) {
    if($_SESSION["idRole"] != ADMIN) {
        echo "Vous devez etre administrateur pour accéder à ces fonctionnalités.";
        return 0;
    }
  } else {
    echo "Vous devez etre administrateur pour accéder à ces fonctionnalités.";
    return 0;
  }
  if(isset($_POST["nom"])) {
    $formAction = 'modifyUser';
  } else {
    $formAction = 'addUser';
  }
?>
<form method="POST" id="formArticle">
  <input type="text" name="name" value="<?php if(isset($_POST["name"])) echo $_POST["name"] ?>" placeholder="nom">
  <input type="text" name="surname" value="<?php if(isset($_POST["surname"])) echo $_POST["surname"] ?>" placeholder="prenom">
  <input type="email" name="email" value="<?php if(isset($_POST["email"])) echo $_POST["email"] ?>" placeholder="email">
  <input type="password" name="password" value="<?php if(isset($_POST["password"])) echo $_POST["password"] ?>" placeholder="mdp">

  <label for="role">Role :</label>
  <select name="role">
    <?php
    require_once DAO_ROLE;
    foreach (DAORoles::getRoles() as $rData) {
    ?>
    <option value="<?php echo $rData->getId(); ?>"><?php echo $rData->getName(); ?></option>
    <?php }
    ?>
  </select>
  <input type="submit" name="<?php echo $formAction ?>" value="Ajouter l'utilisateur">
</form>
<?php
}
?>
