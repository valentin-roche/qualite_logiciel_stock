<?php

require_once MODEL_ARTICLE;
require_once CONNECTBDD;

class DAOArticle
{
    public function __construct(){}

    public static function getArticle($id)
    {
        $bdd = ConnectBDD::getConnection();

        $req = $bdd->prepare('SELECT * FROM articles WHERE idArticle = :id');
        $req->bindValue(':id', $id);

        $req->execute();

        $data = $req->fetch(PDO::FETCH_ASSOC);
        return new Article($data['idArticle'], $data['nom'], $data['description']);
    }

    public static function addArticle(Article $article)
    {
        $bdd = ConnectBDD::getConnection();

        $req = $bdd->prepare('INSERT INTO articles(nom, description) VALUES (:nom, :description)');
        $req->bindValue(':nom', $article->getName());
        $req->bindValue(':description', $article->getDescription());

        $req->execute();

        $last_id = $bdd->lastInsertId();
        $article->setId($last_id);
        return true;
    }

    public static function removeArticle(Article $article)
    {
        $bdd = ConnectBDD::getConnection();

        $req = $bdd->prepare('DELETE FROM article WHERE idArticle = :id');
        $req->bindValue(':id', $article->getId());

        $req->execute();
    }

    public static function updateArticle(Article $article)
    {
        $bdd = ConnectBDD::getConnection();

        $req = $bdd->prepare('UPDATE TABLE article SET nom = :nom, description = :desc WHERE idArticle = :id');
        $req->bindValue(':nom', $article->getName());
        $req->bindValue(':description', $article->getDescription());
        $req->bindValue(':id', $article->getId());

        $req->execute();

    }

    public static function getCatalog()
    {
        $bdd = ConnectBDD::getConnection();

        $req = $bdd->prepare('SELECT * FROM article');

        $req->execute();

        $article_list = [];

        $articleDataList = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($articleDataList as $articleData) {
            $article_list[] = new Article($articleData['idArticle'], $articleData['nom'], $articleData['description']);
        }

        return $article_list;
    }

}
