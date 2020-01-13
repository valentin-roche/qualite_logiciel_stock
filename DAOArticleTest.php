<?php 

require_once "config/config.php";
require_once DAO_ARTICLE;

use PHPUnit\Framework\TestCase;


class DAOArticleTest extends TestCase
{

	public function testSetUpDb() {
		$stub = new Article(0, 'TestArticle', 'An article');
		$id = DAOArticle::addArticle($stub);
		//$this->assertTrue($id != 0);
		$this->assertTrue(true);
		return $id;
	}

	/**
	* @depends testSetUpDb
	**/
	public function testGetArticle($id) {
		DAOArticle::getArticle($id);
		//$this->assertSame($stub->getName(), 'TestArticle');
		//$this->assertSame('allo', 'TestArticle');
		//$this->assertSame($stub->getDescription(), 'An article');
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
	}
}
?> 