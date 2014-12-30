<?php

/**
 * Description of ArticleController
 *
 * @author banix
 */
class ArticleController extends Zend_Controller_Action {

	public function init() {
	}

	public function indexAction() {
	}

	public function viewAction() {
		Zend_Controller_Action_HelperBroker::addPath(APPLICATION_PATH .'/controllers/helpers');
		$id = $this->getRequest()->getParam('id');
		$this->view->html = $this->_helper->articleHelper->getArticleHTML($id);
	}
}