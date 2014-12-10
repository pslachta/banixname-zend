<?php

/**
 * Description of Articles
 *
 * @author banix
 */
class Application_Model_DbTable_Articles extends Zend_Db_Table_Abstract  {
	
	protected $_name = 'clanky';

    public function getArticle($id) {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }

    public function addArticle($name, $body, $author, $wdate, $directory, $category) {
        $data = array(
            'nazev' => $name,
			'txt' => $body,
			'autor' => $author,
			'wdatcas' => $wdate,
			'dire' => $directory, 
			'kat' => $category,
        );
        $this->insert($data);
    }

    public function updateArticle($id, $name, $body, $author, $wdate, $directory, $category) {
        $data = array(
            'nazev' => $name,
			'txt' => $body,
			'autor' => $author,
			'wdatcas' => $wdate,
			'dire' => $directory, 
			'kat' => $category,
        );
        $this->update($data, 'id = '. (int)$id);
    }

    public function deleteArticle($id) {
        $this->delete('id =' . (int)$id);
    }
}
