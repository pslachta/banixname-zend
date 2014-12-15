<?php

/**
 * Description of ArticleController
 *
 * @author banix
 */
class ArticleController extends Zend_Controller_Action {

//	var $article = [
//		'id' => 0,
//		'author' => '-b-n-x-',
//		'email' => 'banix@centrum.cz',
//		'body' => 'Testovaci text',
//		'name' => 'Pokusny clanek',
//		'category' => 'testovaci',
//		'directory' => 'ropice',
//	];
//	var $artImages = [
//		['id' => 1,'img' => 'dawnw.jpg','thumb' => 'dawnic.jpg','title' => 'Slunce nad mořem','desc'=>'V tuto chvíli jsme si připadali jako nějakém souostroví'],
//		['id' => 1,'img' => 'dawn2w.jpg','thumb' => 'dawn2ic.jpg','title' => 'Východ','desc'=>'Všude dokola jenom moře a semtam nějaký ostrůvek.'],
//		['id' => 1,'img' => 'morew.jpg','thumb' => 'moreic.jpg','title' => 'Mlhopad','desc'=>'Dokonce v Tyrském údolí bylo tenkrát moře výše než v Řeckém.'],
//		['id' => 1,'img' => 'woodw.jpg','thumb' => 'woodic.jpg','title' => 'Temný les','desc'=>'Takto vypadá zatopený les asi 8 m pod hladinou.'],
//	];

	public function init() {
		$this->articles = new Application_Model_DbTable_Articles();
		$this->authors = new Application_Model_DbTable_Authors();
		$this->images = new Application_Model_DbTable_Images();
		$id = $this->getRequest()->getParam('id');
		$this->view->article = $this->getArticle($id);
		$this->view->articleImages = $this->getArticleImages($id);
		$this->view->html = $this->getArticleHTML();
	}

	public function indexAction() {
	}

	public function viewAction() {
	}

	private function getArticle($id) {
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

	private function getArticleImages($id) {
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
	
	public function getArticleHTML() {
		
		$html = '' 
		.'<tr>'
		.'	<td align="center">'
		.'		<h3>'.$this->view->article['name'].'</h3>'
		.'	</td>'
		.'</tr>'
		.'<tr>'
		.'	<td align="left">'
		.'		<p>'.$this->view->article['body'].'</p>'
		.'	</td>'
		.'</tr>  '
		.'<tr>'
		.'	<td align="center">'
		.'		<p>Pictures</p>';
				foreach ($this->view->articleImages as $image) {
					$size=getimagesize('articles/'.$this->view->article['directory'].'/'.$image['image']);
					$html .= '<a href="javascript:closeWindow();openWindow1(\'../picone?id='.$image['id'].'\','.($size[0]+16).','.($size[1]+60).')">'
					.'<img src="../articles/'.$this->view->article['directory'].'/thumb/'.$image['thumb'].'" border="0" alt="'.$image['title'].'">'
					.'</a>'."\n"; 
				}
		$html .= '	</td>'
		.'</tr>'
		.'<tr>'
		.'	<td align="right">'
		.'		<a href="mailto:'.$this->view->article['email'].'">'.$this->view->article['author'].'</a>'
		.'	</td>'
		.'</tr>';
		return $html;
	}
}