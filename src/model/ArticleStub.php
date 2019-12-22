<?php
require_once "Article.php";

class ArticleStub extends Article
{

    public function __construct()
    {
        parent::__construct(0, "Article_Test", "Un super article de test !");
    }

}
