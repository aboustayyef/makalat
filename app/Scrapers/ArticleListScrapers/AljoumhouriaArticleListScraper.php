<?php 

namespace App\Scrapers\ArticleListScrapers;

/**
 * 
 * Annahar's implementation needs to work around a problem:
 * Articles are duplicated with different links on the author's page,
 * So we have to check that we don't get 2 links for each article;
 * 
 */


Class AljoumhouriaArticleListScraper extends _ArticleListScraper {
	

	public function getList(){
		
		// results array
		$list = [];
		
		// path to all links on authors' pages
		$links = $this->crawler->filter('.editorNewsList .floatRevClass a');
		
		// prepare variables
		$url = "";
		$title = "";

		foreach ($links as $key => $link) {

			// if the link or title are identitcal to previous entry, skip
			
			if ( $link->getAttribute('href') == $url ) {
				continue;
			}
			$url = $link->getAttribute('href'); 
            $title = $link->nodeValue;   

            $list[] = 'http://www.aljoumhouria.com' . $url;
        }

        return $list;

	}

}


?>