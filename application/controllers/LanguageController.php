<?php

class LanguageController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function setAction()
    {
        // action body
		$language = $this->getRequest()->getParam('lang');
		$session = Zend_Registry::get('session');
		$session->language = $language;
		
		$this->_forward('index', 'index');
    }


}



