<?php
require_once DAO_ARTICLE;

if isset($_GET['q']) $q_param = $_GET['q'];

if isset($q_param) {
  $art_list = DAOArticle::searchArticle($q_param);

  displaySearchResults($art_list);
}
else {
  displayErr();
}

 ?>
