<?php
require_once MODEL_RAYON;
require_once CONNECTBDD;

/**
 *
 */
 class DAORayon
{

  public static function getRayons() {
    $db = ConnectBDD::getConnection();

    $req = $db->prepare('SELECT * FROM rayon');

    $req->execute();

    $rayons = [];

    $rDataList = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rDataList as $rData) {
        $r = new Rayon();
        $r->create($rData['idRayon'], $rData['nom'], $rData['idResponsable']);
        $rayons[] = $r;
    }

    return $rayons;

  }

  public static function addArticle($qtt, $price, $idArticle, $idRayon) {
      $db = ConnectBDD::getConnection();

      $req = $db->prepare('INSERT INTO vend VALUES (:quantity, :price, :idArticle, :idRayon)');
      $req->bindValue(':quantity', $qtt);
      $req->bindValue(':price', $price);
      $req->bindValue(':idArticle', $idArticle);
      $req->bindValue(':idRayon', $idRayon);

      $req->execute();
  }

  public static function updateArticle($qtt, $price, $idArticle, $idRayon) {
      $db = ConnectBDD::getConnection();

      $req = $db->prepare('UPDATE vend
        SET stock = :quantity,
            prix = :price,
            idRayon = :idRayon
        WHERE idArticle = :idArticle ');
      $req->bindParam(':quantity', $qtt);
      $req->bindParam(':price', $price);
      $req->bindParam(':idArticle', $idArticle);
      $req->bindParam(':idRayon', $idRayon);

      return $req->execute();
  }

  public static function isSold($idArticle, $idRayon) {
    $db = ConnectBDD::getConnection();

    $req = $db->prepare('SELECT * FROM rayon NATURAL JOIN vend NATURAL JOIN articles WHERE idArticle = '.$idArticle.' AND idRayon = '.$idRayon);

    $req->execute();

    return empty($req->fetchAll(PDO::FETCH_ASSOC));
  }

  function __construct() {}
}

?>
