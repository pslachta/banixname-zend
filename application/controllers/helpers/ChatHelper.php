<?php

/**
 * Description of ChatHelpers
 *
 * @author banix
 */
class Zend_Controller_Action_Helper_ChatHelper extends Zend_Controller_Action_Helper_Abstract {
	
	public function init() {
		$this->chata = new Application_Model_DbTable_SelectChat();
		$this->limit = Zend_Registry::getInstance()->chat->pagelimit;
	}
	
	public function getPaginator($offset = 0) {
		$counts = $this->chata->getChatCount('chata') - $this->limit;
		$noffs = $offset >= $this->limit ? $offset - $this->limit : 0;
		$poffs = $offset < $counts ? $offset + $this->limit : $counts;
		$html = '<a href="?offs=0">Nejnovější</a>&nbsp&nbsp<a href="?offs='.$noffs.'">Novější</a>&nbsp&nbsp<a href="?offs='.$poffs.'">Starší</a>&nbsp&nbsp<a href="?offs='.$counts.'">Nejstarší</a>&nbsp&nbsp';
		return $html;
	}
}
