<?php

class Application_Model_RatesAppt2Mapper
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
            $this->setDbTable('Application_Model_DbTable_RatesAppt2');
        }
        return $this->_dbTable;
    }
	
	/*
	 * Get the 13 lastest rate information
	 */
	public function getLastRates()
	{
		$select = $this->getDbTable()	->select()
										->from(	array('ratesAppt2'),
												array('period', 'begin', 'end', 'week', 'night'))
										->order(array('end DESC'))
										->limit(13, 0);
		//print $select->__toString();
		$stmt = $select->query();
		$resultSet = $stmt->fetchAll();
		
		$entries   = array();
        foreach ($resultSet as $row) {
			$entry = new Application_Model_RatesAppt();
            $entry	->setPeriod($row['period'])
					->setBegin($row['begin'])
					->setEnd($row['end'])
					->setWeek($row['week'])
					->setNight($row['night']);
			$entries[] = $entry;
        }
        return $entries;	
	}
	
	/*
	 * Get the min night rate
	 */
	public function getMinNightRate()
	{
		$select = $this->getDbTable()	->select()
										->from(	array('ratesAppt2'),
												array('end', 'night'))
										->order(array('end DESC'))
										->limit(13, 0);
		//print $select->__toString();
		$stmt = $select->query();
		$resultSet = $stmt->fetchAll();
		
		$minRate = 10000;
		
        foreach ($resultSet as $row) {
			if ($row['night'] < $minRate) {
				$minRate = $row['night'];
			}
        }
        return $minRate;	
	}
	
	/*
	 * Get the max night rate
	 */
	public function getMaxNightRate()
	{
		$select = $this->getDbTable()	->select()
										->from(	array('ratesAppt2'),
												array('end', 'night'))
										->order(array('end DESC'))
										->limit(13, 0);
		//print $select->__toString();
		$stmt = $select->query();
		$resultSet = $stmt->fetchAll();
		
		$maxRate = 0;
		
        foreach ($resultSet as $row) {
			if ($row['night'] > $maxRate) {
				$maxRate = $row['night'];
			}
        }
        return $maxRate;	
	}
	
	/*
	 * Get the min week rate
	 */
	public function getMinWeekRate()
	{
		$select = $this->getDbTable()	->select()
										->from(	array('ratesAppt2'),
												array('end', 'week'))
										->order(array('end DESC'))
										->limit(13, 0);
		//print $select->__toString();
		$stmt = $select->query();
		$resultSet = $stmt->fetchAll();
		
		$minRate = 10000;
		
        foreach ($resultSet as $row) {
			if ($row['week'] < $minRate) {
				$minRate = $row['week'];
			}
        }
        return $minRate;	
	}
	
	/*
	 * Get the max week rate
	 */
	public function getMaxWeekRate()
	{
		$select = $this->getDbTable()	->select()
										->from(	array('ratesAppt2'),
												array('end', 'week'))
										->order(array('end DESC'))
										->limit(13, 0);
		//print $select->__toString();
		$stmt = $select->query();
		$resultSet = $stmt->fetchAll();
		
		$maxRate = 0;
		
        foreach ($resultSet as $row) {
			if ($row['week'] > $maxRate) {
				$maxRate = $row['week'];
			}
        }
        return $maxRate;	
	}

}

