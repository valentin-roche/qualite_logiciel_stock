<?php 

require_once "../config/configtests.php";
require_once DAO_ARTICLE;
require_once DAO_RAYON;

use PHPUnit\Framework\TestCase;


class DAOArticleTest extends TestCase
{

	private $_articles;
	private $_rayons;

	/**
	* @before
	**/
	public function setUpDB() 
	{
		$this->_articles[0] = new Article();
		$this->_articles[0]->createSimple('Article', 'Some article');
		$id = DAOArticle::addArticle($this->_articles[0]);
		$this->_articles[0]->setId($id);

		$this->_articles[1] = new Article();
		$this->_articles[1]->createSimple('AnotherArticle', 'Just an other article');
		$id = DAOArticle::addArticle($this->_articles[1]);
		$this->_articles[1]->setId($id);

		$this->_articles[2] = new Article();
		$this->_articles[2]->createSimple('OneMoreArticle', 'How many of those are there ?');
		$id = DAOArticle::addArticle($this->_articles[2]);
		$this->_articles[2]->setId($id);

		$this->_rayons[0] = new Rayon();
		$this->_rayons[0]->create(1, 'First section', 0);

		$this->_rayons[1] = new Rayon();
		$this->_rayons[1]->create(2, 'Second section', 0);

		DAORayon::addArticle(10, 10, $this->_articles[0]->getId(), $this->_rayons[0]->getId());
		DAORayon::addArticle(5, 20, $this->_articles[1]->getId(), $this->_rayons[1]->getId());
	}

	/**
	* @after
	**/
	public  function emptyDB() {
		$catalog = DAOArticle::getCatalog();
		foreach($catalog as $key) {
			DAOArticle::removeArticle($key);
		}

	}

	public function testGetArticle() 
	{
		for($i=0; $i<3; $i++) {
			$article = DAOArticle::getArticle($this->_articles[$i]->getId());
			$this->assertSame($article->getName(), $this->_articles[$i]->getName());
			$this->assertSame($article->getDescription(), $this->_articles[$i]->getDescription());	
		}
	}

	public function testGetArticleByName() 
	{
		for($i=0; $i<3; $i++) {
			$article = DAOArticle::getArticleByName($this->_articles[$i]->getName());
			$this->assertSame($article->getId(), $this->_articles[$i]->getId());
			$this->assertSame($article->getDescription(), $this->_articles[$i]->getDescription());	
		}
	}

	public function testAddArticle() 
	{
		$article = new Article();
		$article->create(0, 'TestArticle', 'An article');
		$id = DAOArticle::addArticle($article);
		$this->assertTrue($id != 0);
		$newArticle = DAOArticle::getArticle($id);
		$this->assertSame($newArticle->getName(), $article->getName());
		$this->assertSame($newArticle->getDescription(), $article->getDescription());	
	}
	
	public function testUpdateArticle() 
	{
		$article = new Article();
		$article->create($this->_articles[0]->getId(), 'UpdatedArticle', 'Still an article');
		DAOArticle::updateArticle($article);
		$updated_article = DAOArticle::getArticle($article->getId());
		$this->assertSame($updated_article->getName(), $article->getName());
		$this->assertSame($updated_article->getDescription(), $article->getDescription());
	}


	public function testGetCatalog() 
	{
		$catalog = DAOArticle::getCatalog();
		$this->assertSame(count($catalog), 3);
	}

	public function testRemoveArticle() 
	{
		$article = new Article();
		DAOArticle::removeArticle($this->_articles[0]);

		$catalog = DAOArticle::getCatalog();
		$this->assertSame(count($catalog), 2);
	}

	public function testGetQuantity()
	{
		$article = $this->_articles[0];
		$this->assertSame(DAOArticle::getQuantity($article->getId()), '10');

		$article = $this->_articles[1];
		$this->assertSame(DAOArticle::getQuantity($article->getId()), '5');
	}

	public function testGetPrice()
	{
		$article = $this->_articles[0];
		$this->assertSame(DAOArticle::getPrice($article->getId()), '10');

		$article = $this->_articles[1];
		$this->assertSame(DAOArticle::getPrice($article->getId()), '20');
	}
}

?> 