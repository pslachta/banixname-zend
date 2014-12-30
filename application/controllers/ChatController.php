<?php

/**
 * Description of ChatController
 *
 * @author banix
 */
class ChatController extends Zend_Controller_Action {

	public function init() {
		$this->chata = new Application_Model_DbTable_SelectChat();
		$this->view->isLogged = TRUE;
		$this->view->newPost = FALSE;
		$this->offs = $this->getRequest()->getParam('offs');
		$this->limit = Zend_Registry::getInstance()->chat->pagelimit;
	}

	public function indexAction() {
		$this->view->lastChata = $this->chata->getChataLastEntry('chata');
		$this->view->lastAction = $this->chata->getChataLastEntry('action');
		$this->view->lastTry = $this->chata->getChataLastEntry('try');
		$this->view->lastRide = $this->chata->getChataLastEntry('ride');
		$this->view->lastBazar = $this->chata->getChataLastEntry('bazar');
	}

	public function chataAction() {
		$this->view->chatChata = $this->chata->getChatPage('chata', $this->offs);
		Zend_Controller_Action_HelperBroker::addPath(APPLICATION_PATH .'/controllers/helpers');
		$this->view->paginator = $this->_helper->chatHelper->getPaginator($this->offs);
		//$this->view->loginbox = $this->_helper->viewRenderer->setRender('loginbox');
	}

	public function bazarAction() {
		
	}

	public function rideAction() {
		
	}

	public function postAction() {
		
	}

	public function eventAction() {
		
	}

	public function tryAction() {
		
	}

	public function newregAction() {
		
	}

}
