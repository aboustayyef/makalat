<?php 

namespace App\Scrapers\ArticleListScrapers;

use Symfony\Component\DomCrawler\Crawler;

/**
 * 
 * 	This is the base for a class that extracts a list of URLs for specific media entities
 * 	construct with $url and returns an array of links;
 * 	
 */

Abstract Class ArticleListScraper{
	
	protected $crawler;
	
	public function __construct($url=null){

		$this->crawler = new Crawler;
		$this->crawler->addHtmlContent(@file_get_contents($url));	

	}

	abstract function getList();

}


?>