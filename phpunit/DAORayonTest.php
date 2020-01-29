<?php

require_once "../config/configtests.php";
require_once DAO_RAYON;

use PHPUnit\Framework\TestCase;


class DAOArticleTest extends TestCase
{

	/**
	* @befre
	public function setUpDb() 
	{
		$rayon = new Rayon();
		$rayon->createSimple('First Section', 0);
		DAORayon::AddArticle()
	}
	**/

	public function testGetRayons() {
		$rayonNames = array('First Section', 'Second Section', 'Third Section', 'Fourth Section');
		$rayons = DAORayon::getRayons();
		$nbRayons = count($rayons);

		$this->assertSame($nbRayons, 4);
		for($i=0;$i<$nbRayons;$i++)
		{
			$this->assertSame($rayons[$i]->getName(), $rayonNames[$i]);
		}
	}

	public function testAddArticle() {
		
	}
}








?>