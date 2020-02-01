<?php
require_once MODEL_USER;
require_once DAO_USER;

if(isset($_POST['formAction'])) $formAction = $_POST['formAction'];
if(isset($_GET['navAction'])) $formNav = $_GET['navAction'];

//Select which form to display
if(isset($formNav)) {
  switch ($formNav) {
    case 'addUser':
      $formAction = 'addUser';
      displayAddForm();
      break;
    case 'modifyUser':
      $formAction = 'modifyUser';
      displayModForm($_GET['userId']);
      break;
  }
}

//After the form has been submitted
if($formAction and isset($_POST["name"])) {
  switch ($formAction) {
    case 'addUser':
      $id = addUser($_POST["password"], $_POST["name"], $_POST["surname"], $_POST["email"], $_POST["role"]);
      if (isset($id)) {
        header('Location: http://qualite-logiciel-stock/');
        exit();
      } else {
        echo "Echec";
      }
      break;
    case 'modifyUser':
      /*$id = modifyArticle($_POST["name"], $_POST["desc"], $_POST["rayon"], $_POST["quantity"], $_POST["price"], $_GET["articleId"]);
      if (isset($id)) {
        header('Location: http://qualite-logiciel-stock/article.php?idArticle='.$id);
        exit();
      } else {
        echo "Echec";
      }*/
      break;
  }
}

function addUser($passwd, $name, $surname, $mail, $roleId) {
  $user = new User();
  $user->createsimple($passwd, $name, $surname, $mail, $roleId);
  $idUser = DAOUser::addUser($user);
  return $idUser;
}

 ?>
