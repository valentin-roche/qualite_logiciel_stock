  
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
        $ret = new Article();
        $ret->create($data['idArticle'], $data['nom'], $data['description']);
        return $ret;
    }

    public static function getArticleByName($name) {
      $bdd = ConnectBDD::getConnection();

      $req = $bdd->prepare('SELECT * FROM articles WHERE nom = :name');
      $req->bindValue(':name', $name);

      $req->execute();

      $data = $req->fetch(PDO::FETCH_ASSOC);
      $ret = new Article();
      $ret->create($data['idArticle'], $data['nom'], $data['description']);
      return $ret;
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
        return $last_id;
    }
    public static function removeArticle(Article $article)
    {
        $bdd = ConnectBDD::getConnection();
      
        $req = $bdd->prepare('DELETE FROM articles WHERE idArticle = :id');
        $req->bindValue(':id', $article->getId());
        $req->execute();
    }
    public static function updateArticle(Article $article)
    {
        $bdd = ConnectBDD::getConnection();
      
        $req = $bdd->prepare("UPDATE articles SET nom = :nom, description = :description WHERE idArticle = :articleId");
        $req->bindValue(':nom', $article->getName(), PDO::PARAM_STR);
        $req->bindValue(':description', $article->getDescription(), PDO::PARAM_STR);
        $req->bindValue(':articleId', $article->getId(), PDO::PARAM_INT);

        $failed = $req->execute();

        return $failed;
    }
    public static function getCatalog()
    {
        $bdd = ConnectBDD::getConnection();

        $req = $bdd->prepare('SELECT * FROM articles');
      
        $req->execute();
        $article_list = [];
        $articleDataList = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($articleDataList as $articleData) {
            $article = new Article();
            $article->create($articleData['idArticle'], $articleData['nom'], $articleData['description']);
            $article_list[] = $article;
        }
        return $article_list;
    }

    public static function getQuantity(String $id)
    {
      $bdd = ConnectBDD::getConnection();

      $req = $bdd->prepare('SELECT stock FROM vend WHERE idArticle = :id');
      $req->bindValue(':id', $id);

      $req->execute();

      $data = $req->fetch(PDO::FETCH_ASSOC);

      return strval($data['stock']);
    }

    public static function getPrice(String $id)
    {
      $bdd = ConnectBDD::getConnection();

      $req = $bdd->prepare('SELECT prix FROM vend WHERE idArticle = :id');
      $req->bindValue(':id', $id);

      $req->execute();

      $data = $req->fetch(PDO::FETCH_ASSOC);

      return strval($data['prix']);
    }

}