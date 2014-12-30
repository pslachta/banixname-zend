<?php

/**
 * Description of ChatController
 *
 * @author banix
 */
class ChatController extends Zend_Controller_Action {

	public function init() {
		$this->chata = new Application_Model_DbTable_SelectChat();
	}

	public function indexAction() {
		$this->view->isLogged = FALSE;
		$this->view->lastChata = $this->chata->getChataLastEntry('chata');
		$this->view->lastAction = $this->chata->getChataLastEntry('action');
		$this->view->lastTry = $this->chata->getChataLastEntry('try');
		$this->view->lastRide = $this->chata->getChataLastEntry('ride');
		$this->view->lastBazar = $this->chata->getChataLastEntry('bazar');
	}

	public function chataAction() {
		$this->view->chatChata = $this->chata->getChatPage('chata');
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
