<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
		/* Initialize action controller here */
	}

	public function indexAction() {
//		echo "Article - index()";
	}

	public function viewAction() {
		$this->articles = new Application_Model_DbTable_Articles();
		$this->authors = new Application_Model_DbTable_Authors();
		$this->images = new Application_Model_DbTable_Images();
		$id = $this->getRequest()->getParam('id');
		$this->view->article = $this->getArticle($id);
		$this->view->articleImages = $this->getArticleImages($id);
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

}
