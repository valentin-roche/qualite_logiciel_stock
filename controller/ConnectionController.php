<?php
require_once DAO_USER;
require_once MODEL_USER;
if(isset($_POST['connexion'])){
    if(empty($_POST['login'])){
        echo "Le champ login est vide.";
    }
    else{
        if(empty($_POST['password'])){
            echo "Le champ mot de passe est vide.";
        }
        else{
            $login = $_POST['login'];
            $password = $_POST['password'];
            if(!DAOUser::checkConnection($login, $password)){
                echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
            }
            else{
                session_start();
                $membre = MembreDAO::get($Pseudo);
                $_SESSION['pseudo'] = $Pseudo;
                $_SESSION['motDePasse'] = $membre->getmotDePasse();
                $_SESSION['karma'] = $membre->getKarma();
                $_SESSION['admin'] = $membre->getEstAdmin();
                $_SESSION['nom'] = $membre->getnomUtil();
                $_SESSION['prenom'] = $membre->getprenomUtil();
                $_SESSION['discord'] = $membre->getDiscord();
                $_SESSION['teamspeak'] = $membre->getTeamspeak();
                header( 'Location: index.php' );

            }
        }
    }
}
if(isset($_POST['deconnexion'])){
  session_start();
  $_SESSION = array();
  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
  }
  session_destroy();
  header( 'Location: index.php' );
}
?>
