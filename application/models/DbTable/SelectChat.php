<?php

/**
 * Description of SelectChat
 *
 * @author banix
 */
class Application_Model_DbTable_SelectChat extends Zend_Db_Table_Abstract/*extends Zend_Db_Adapter_Abstract*/ {

	public function getChataLastEntry($table) {
		$select = $this->_db->select()->from(['t'=>$table],["time_format(datcas,'%d.%m.%Y') AS datum","time_format(datcas,'%H:%i:%s') AS cas"])
				->join(['u'=>'user1'], 'u.uid = t.uid', ['user'])
				->order('t.id desc')
				->limit(1);
		$stmt = $select->query();
		return $stmt->fetchAll()[0];
    }
	
	public function getChatPage($chatType, $offset = 0, $limit = 15) {
				$select = $this->_db->select()->from(['t'=>$chatType],['id', 'txt', "date_format(datcas,'%d.%m.%Y') AS datum","time_format(datcas,'%H:%i:%s') AS cas"])
				->join(['u'=>'user1'], 'u.uid = t.uid', ['user','pic'])
				->order('t.id desc')
				->limit($limit, $offset);
		$stmt = $select->query();
		return $stmt->fetchAll();
	}
	
	public function listTables() {}
	public function describeTable($tableName, $schemaName = NULL) {}
	public function _connect() {}
}
