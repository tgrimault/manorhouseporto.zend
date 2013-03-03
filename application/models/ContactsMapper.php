<?php

class Application_Model_ContactsMapper
{
	protected $_dbTable;
 
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }
 
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Contacts');
        }
        return $this->_dbTable;
    }
	
	public function save(Application_Model_Contacts $contact)
    {
        $data = array(
            'name'	=>	$contact->getName(),
			'email'	=>	$contact->getEmail(),
			'date'	=>	$contact->getDate(),
			'pays'	=>	$contact->getPays()
        );
 
        if (null === ($id = $contact->getId())) {
            unset($data['id']);
            return $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
			return $id;
        }
    }
	
	public function find($id, Application_Model_Contacts $contact)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $contact->setId($row->id)
          		->setName($row->name)
              	->setEmail($row->email)
				->setDate($row->date)
				->setPays($row->pays);
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Contacts();
            $entry	->setId($row->id)
          			->setName($row->name)
              		->setEmail($row->email)
					->setDate($row->date)
					->setPays($row->pays);
            $entries[] = $entry;
        }
        return $entries;
    }

	public function delete($id)
	{
		$where = 'id = '.$id;
		$this->getDbTable()->delete($where);	
	}

}

