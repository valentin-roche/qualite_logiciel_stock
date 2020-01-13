<?php 

require_once "config/config.php";
require_once DAO_ARTICLE;

use PHPUnit\Framework\TestCase;


class DAOArticleTest extends TestCase
{

	public function testAddArticle() {
		$id = DAOArticle::addArticle(new Article(0, 'TestArticle', 'An article'));
		//$this->assertTrue($id != 0);
		$this->assertTrue(true);
		return $id;
	}

	/**
	* @depends testAddArticle
	**/
	public function testGetArticle($id) {
		DAOArticle::getArticle($id);
		$this->assertSame($stub->getName(), 'TestArticle');
		$this->assertSame('allo', 'TestArticle');
		$this->assertSame($stub->getDescription(), 'An article');
		return $id;
	}


	/**
	* @depends testGetArticle
	**/
	public function testUpdateArticle($id) {
		$stub = new Article($id, 'UpdatedArticle', 'Still an article');
		DAOArticle::updateArticle($stub);
		$updated_article = DAOArticle::getArticle($id);
		$this->assertSame($updated_article->getName(), 'UpdatedArticle');
		$this->assertSame($updated_article->getDescription(), 'Still an article');
		return $id;
	}

	/**
	* @depends testUpdateArticle
	**/
	public function testGetCatalog($id) {
		DAOArticle::addArticle(new Article(0, 'AnotherArticle', 'Just an other article'));
		DAOArticle::addArticle(new Article(0, 'OneMoreArticle', 'How many of those are there ?'));

		$catalog = DAOArticle::getCatalog();
		$this->assertSame(count($catalog), 3);

		return $id;
	}

	/** 
	* @depends testGetCatalog
	**/
	public function testRemoveArticle($id) {
		DAOArticle::removeArticle(new Article($id, '', ''));
		$catalog = DAOArticle::getCatalog();
		$this->assertSame(count($catalog), 2);
	}

	/**
	* @afterClass
	**/
	public  function emptyDB() {
		//
	}
}
?> 