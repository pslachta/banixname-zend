<?php

/**
 * Description of Images
 *
 * @author banix
 */
class Application_Model_DbTable_Images extends Zend_Db_Table_Abstract {

	protected $_name = 'obr';

	public function getImages($articleId) {
		$articleId = (int) $articleId;
		$rows = $this->fetchArray('clanid = ' . $articleId);
		if (!$rows) {
			throw new Exception("Could not find row $articleId");
		}
		return $rows;
	}
	
	public function getImage($id) {
		$id = (int) $id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row) {
			throw new Exception("Could not find row $id");
		}
		return $row->toArray();
	}

	public function addImage($articleId, $image, $thumb, $title, $description) {
		$data = array(
			'clanid' => $articleId,
			'img' => $image,
			'thumb' => $thumb,
			'popisek' => $title,
			'txt' => $description,
		);
		$this->insert($data);
	}

	public function updateImage($id, $articleId, $image, $thumb, $title, $description) {
		$data = array(
			'clanid' => $articleId,
			'img' => $image,
			'thumb' => $thumb,
			'popisek' => $title,
			'txt' => $description,
		);
		$this->update($data, 'id = ' . (int) $id);
	}

	public function deleteImage($id) {
		$this->delete('id =' . (int) $id);
	}

}
