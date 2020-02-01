<?php
include "header.php";
displayHeader("Connection", "");
require_once MODEL_USER;
require_once CONNECTION_CONTROLLER;
?>
  <h2>Connexion</h2>
  <form action="<?php CONNECTION_CONTROLLER ?>" method="post">
    <input id="username" name="mail" type="email" placeholder="mail" size="30">
    <input id="password" name="password" type="password" placeholder="mot de passe" size="30">
    <input type="submit" name="connection" value = "Se connecter">
  </form>
<?php
  include "footer.php";
  displayFooter();
?>
