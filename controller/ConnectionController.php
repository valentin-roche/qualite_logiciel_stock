<?php
require_once DAO_USER;
require_once MODEL_USER;

if(isset($_POST['connection'])){
    if(empty($_POST['mail'])){
        echo "Le champ mail est vide.";
    }
    else{
        if(empty($_POST['password'])){
            echo "Le champ mot de passe est vide.";
        }
        else{
            $mail = $_POST['mail'];
            $password = $_POST['password'];
            if(!DAOUser::checkConnection($mail, $password)){
                echo "Le mail ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
            }
            else{
                session_start();
                $user = DAOUser::getUserByMail($mail);
                $_SESSION['mail'] = $mail;
                $_SESSION['password'] = $user->getPasswd();
                $_SESSION['name'] = $user->getName();
                $_SESSION['surname'] = $user->getSurname();
                $_SESSION['id'] = $user->getId();
                $_SESSION['idRole'] = $user->getIdRole();
                header( 'Location: index.php' );
            }
        }
    }
}
if(isset($_POST['deconnection'])){
  session_start();
  $_SESSION = array();
    $params = session_get_cookie_params();
    if (ini_get("session.use_cookies")) {
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
  }
  session_destroy();
  header( 'Location: index.php' );
}
?>
