<?php

class PiconeController extends Zend_Controller_Action {

	public function init() {
		$this->images = new Application_Model_DbTable_Images();
		$this->articles = new Application_Model_DbTable_Articles();
	}

	public function indexAction() {
		$id = $this->getRequest()->getParam('id');
		$this->view->image = $this->getArticleImage($id);
		$this->view->article = $this->articles->getArticle($this->view->image['clanid']);
	}

	private function getArticleImage($id) {
		$image = $this->images->getImage($id);
		return $image;
	}

}
