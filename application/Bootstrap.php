<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initConstants() {
		$registry = Zend_Registry::getInstance();
		$registry->chat = new Zend_Config($this->getApplication()->getOption('chat'));
	}

}

