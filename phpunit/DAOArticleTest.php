<?php 

require_once DAO_ARTICLE;

use PHPUnit\Framework\TestCase;


class DAOArticleTest extends TestCase
{
	/**
	* @beforeClass
	**/
	public static function setUpDb() {
		$stub = new Article(0, 'TestArticle', 'An article');
		DAOArticle::addArticle($stub);
		return $stub->getId();
	}

	/**
	* @depends setUpDb
	**/
	public static function testGetArticle($id) {
		$stub = DAOArticle::getArticle($id);
		assertSame($stub->getName(), 'TestArticle');
		assertSame($stub->getDescription(), 'An article');
		return $id;
	}

	/**
	* @depends getArticleTest
	**/
	public static function updateArticleTest($id) {
		$stub = new Article($id, 'UpdatedArticle', 'Still an article');
		DAOArticle::updateArticle($stub);
		$updated_article = DAOArticle::getArticle($id);
		assertSame($updated_article->getName(), 'UpdatedArticle');
		assertSame($updated_article->getDescription(), 'Still an article');
	}
}
?> 