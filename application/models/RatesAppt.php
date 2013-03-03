<?php

class Application_Model_RatesAppt
{
	protected $_id;
	protected $_period;
	protected $_begin;
	protected $_end;
	protected $_week;
	protected $_night;
	
	public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }
 
    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid RatesAppt property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid RatesAppt property');
        }
        return $this->$method();
	}
	
	public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }
	
	public function setId($id)
    {
        $this->_id = (int) $id;
        return $this;
    }
 
    public function getId()
    {
        return $this->_id;
    }
	
	public function setPeriod($period)
    {
        $this->_period = $period;
        return $this;
    }
 
    public function getPeriod()
    {
        return $this->_period;
    }
	
	public function setBegin($begin)
    {
        $this->_begin = $begin;
        return $this;
    }
 
    public function getBegin()
    {
        return $this->_begin;
    }
	
	public function setEnd($end)
    {
        $this->_end = $end;
        return $this;
    }
 
    public function getEnd()
    {
        return $this->_end;
    }
	
	public function setWeek($week)
    {
        $this->_week = $week;
        return $this;
    }
 
    public function getWeek()
    {
        return $this->_week;
    }
	
	public function setNight($night)
    {
        $this->_night = $night;
        return $this;
    }
 
    public function getNight()
    {
        return $this->_night;
    }
	
	
}

