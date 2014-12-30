<?php

/**
 * Description of Chata
 *
 * @author banix
 */
class Application_Model_DbTable_Chata extends Zend_Db_Table_Abstract  {
	
	protected $_name = 'chata';

//    public function getLastChata() {
//		//$sqls = "select u.user,concat(date_format(c.datcas,'%d.%m.'), '&nbsp;',time_format(c.datcas,'%H:%i:%s')) as datum from chata c left join user1 u on u.uid=c.uid order by c.id desc limit 1";
//		$row = $this->fetchRow($sqls);
//        if (!$row) {
//            throw new Exception("Could not find row $id");
//        }
//        return $row->toArray();
//    }

    public function addChata($name, $body, $author, $wdate, $directory, $category) {
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

    public function updateChata($id, $name, $body, $author, $wdate, $directory, $category) {
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

    public function deleteChata($id) {
        $this->delete('id =' . (int)$id);
    }
}
