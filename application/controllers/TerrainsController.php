<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AboutUsController
 *
 * @author banix
 */
class TerrainsController extends Zend_Controller_Action {
	
	public function init() {
		/* Initialize action controller here */
	}

	public function indexAction() {
		echo "Tereny";
	}
	public function ropiceAction() {
		echo "Ropice";
	}
	public function lysaAction() {
		echo "Lysa";
	}
	public function tatryAction() {
		echo "Tatry";
	}
	public function valthorensAction() {
		echo "Val Thorens";
	}
	public function ldaAction() {
		echo "LDA";
	}
	public function chamAction() {
		echo "Chamonix";
	}
	public function otherAction() {
		echo "Others";
	}
}
