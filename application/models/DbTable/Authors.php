<?php

/**
 * Description of Authors
 *
 * @author banix
 */
class Application_Model_DbTable_Authors extends Zend_Db_Table_Abstract {

	protected $_name = 'autor';

	public function getAuthor($id) {
		$id = (int) $id;
		$row = $this->fetchRow('uid = ' . $id);
		if (!$row) {
			throw new Exception("Could not find row $id");
		}
		return $row->toArray();
	}

	public function addAuthor($author, $email) {
		$data = array(
			'autor' => $author,
			'email' => $email,
		);
		$this->insert($data);
	}

	public function updateAuthor($id, $author, $email) {
		$data = array(
			'autor' => $author,
			'email' => $email,
		);
		$this->update($data, 'uid = ' . (int) $id);
	}

	public function deleteAuthor($id) {
		$this->delete('uid =' . (int) $id);
	}

}
