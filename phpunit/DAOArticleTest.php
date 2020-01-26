<?php 

require_once "../config/configtests.php";
require_once DAO_ARTICLE;

use PHPUnit\Framework\TestCase;


class DAOArticleTest extends TestCase
{

	private $_id;

	/**
	* @before
	**/
	public function setUpDB() {
		$article = new Article();
		$article->createSimple('Article', 'Some article');
		$this->_id = DAOArticle::addArticle($article); 
		$article->createSimple('AnotherArticle', 'Just an other article');
		DAOArticle::addArticle($article); 
		$article->createSimple('OneMoreArticle', 'How many of those are there ?');
		DAOArticle::addArticle($article); 
	}

	public function testGetArticle() {
		$article = DAOArticle::getArticle($this->_id);
		$this->assertSame($article->getName(), 'Article');
		$this->assertSame($article->getDescription(), 'Some article');
	}

	public function testAddArticle() {
		$article = new Article();
		$article->create(0, 'TestArticle', 'An article');
		$id = DAOArticle::addArticle($article);
		$this->assertTrue($id != 0);
		$newArticle = DAOArticle::getArticle($id);
		$this->assertSame($article->getName(), 'TestArticle');
		$this->assertSame($article->getDescription(), 'An article');	
	}
	
	public function testUpdateArticle() {
		$article = new Article();
		$article->create($this->_id, 'UpdatedArticle', 'Still an article');
		DAOArticle::updateArticle($article);
		$updated_article = DAOArticle::getArticle($this->_id);
		$this->assertSame($updated_article->getName(), 'UpdatedArticle');
		$this->assertSame($updated_article->getDescription(), 'Still an article');
	}
	
	public function testGetCatalog() {
		$catalog = DAOArticle::getCatalog();
		$this->assertSame(count($catalog), 3);
	}

	/** 
	* @depends testGetCatalog
	
	public function testRemoveArticle($id) {
		$catalog = DAOArticle::getCatalog();
		echo count($catalog);
		echo $id;
		DAOArticle::removeArticle(new Article($id, '', ''));
		$catalog = DAOArticle::getCatalog();
		echo count($catalog);
		//$this->assertSame(count($catalog), 2);
		$this->assertTrue(true);
	}**/

	/**
	* @after
	**/
	public  function emptyDB() {
		$catalog = DAOArticle::getCatalog();
		foreach($catalog as $key) {
			DAOArticle::removeArticle($key);
		}
	}
}
?> 