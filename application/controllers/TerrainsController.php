<?php

/**
 * Description of TerrainsController
 *
 * @author banix
 */
class TerrainsController extends Zend_Controller_Action {
	
	public function init() {
		Zend_Controller_Action_HelperBroker::addPath(APPLICATION_PATH .'/controllers/helpers');
		$this->view->article = $this->_helper->articleHelper;
	}

	public function indexAction() {
	}
	public function ropiceAction() {
	}
	public function lysaAction() {
	}
	public function tatryAction() {
	}
	public function valthorensAction() {
	}
	public function ldaAction() {
	}
	public function chamAction() {
	}
	public function otherAction() {
	}
	
}
