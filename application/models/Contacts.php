<?php

class Application_Model_Contacts
{
	protected $_id;
	protected $_name;
	protected $_email;
	protected $_date;
	protected $_pays;
	
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
            throw new Exception('Invalid Contacts property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid Contacts property');
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
	
	public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }
 
    public function getName()
    {
        return $this->_name;
    }
	
	public function setEmail($email)
    {
        $this->_email = $email;
        return $this;
    }
 
    public function getEmail()
    {
        return $this->_email;
    }
	
	public function setDate($date)
    {
        $this->_date = $date;
        return $this;
    }
 
    public function getDate()
    {
        return $this->_date;
    }
	
	public function setPays($pays)
    {
        $this->_pays = $pays;
        return $this;
    }
 
    public function getPays()
    {
        return $this->_pays;
    }

}

