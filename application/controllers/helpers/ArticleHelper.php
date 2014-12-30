<?php

/**
 * Description of ArticleHelpers
 *
 * @author banix
 */
class Zend_Controller_Action_Helper_ArticleHelper extends Zend_Controller_Action_Helper_Abstract {
	
	public function init() {
		$this->articles = new Application_Model_DbTable_Articles();
		$this->authors = new Application_Model_DbTable_Authors();
		$this->images = new Application_Model_DbTable_Images();
	}
	
	public function getArticles() {
		$articles = $this->articles->fetchAll();
		$clanky = [];
		foreach ($articles as $clanek) {
			$article['name'] = $clanek['nazev'];
			$article['body'] = $clanek['txt'];
			$article['category'] = $clanek['kat'];
			$article['directory'] = $clanek['dire'];
			$article['id'] = $clanek['id'];
			$author = $this->authors->getAuthor($clanek['autor']);
			$article['author'] = $author['autor'];
			$article['email'] = $author['email'];
			$clanky[] = $article;
		}
		return $clanky;
	}
	
	public function getArticle($id) {
		$clanek = $this->articles->getArticle($id);
		$article['name'] = $clanek['nazev'];
		$article['body'] = $clanek['txt'];
		$article['category'] = $clanek['kat'];
		$article['directory'] = $clanek['dire'];
		$article['id'] = $clanek['id'];
		$author = $this->authors->getAuthor($clanek['autor']);
		$article['author'] = $author['autor'];
		$article['email'] = $author['email'];
		return $article;
	}

	public function getArticleImages($id) {
		$obrazky = $this->images->fetchAll("clanid = $id");
		$articleImages = [];
		foreach ($obrazky as $obrazek) {
			$image['id'] = $obrazek->id;
			$image['image'] = $obrazek->img;
			$image['thumb'] = $obrazek->thumb;
			$image['title'] = $obrazek->popisek;
			$image['description'] = $obrazek->txt;
			$articleImages[] = $image;
		}
		return $articleImages;
	}
	
	public function getArticleHTML($id=1) {
		$article = $this->getArticle($id);
		$articleImages = $this->getArticleImages($id);
		$html = ''
		.'<tr>'
		.'	<td align="center">'
		.'		<h3>'.$article['name'].'</h3>'
		.'	</td>'
		.'</tr>'
		.'<tr>'
		.'	<td align="left">'
		.'		<p>'.$article['body'].'</p>'
		.'	</td>'
		.'</tr>  '
		.'<tr>'
		.'	<td align="center">'
		.'		<p>Pictures</p>';
				foreach ($articleImages as $image) {
					$size=getimagesize('articles/'.$article['directory'].'/'.$image['image']);
					$html .= '<a href="javascript:closeWindow();openWindow1(\'../picone?id='.$image['id'].'\','.($size[0]+16).','.($size[1]+60).')">'
					.'<img src="../articles/'.$article['directory'].'/thumb/'.$image['thumb'].'" border="0" alt="'.$image['title'].'">'
					.'</a>'."\n"; 
				}
		$html .= '	</td>'
		.'</tr>'
		.'<tr>'
		.'	<td align="right">'
		.'		<a href="mailto:'.$article['email'].'">'.$article['author'].'</a>'
		.'	</td>'
		.'</tr>';
		return $html;
	}
}
