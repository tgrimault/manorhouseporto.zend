<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
		$session = Zend_Registry::get('session');
		$language = $session->language;
		//print_r($language);
		
		$translationsMapper = new Application_Model_TranslationsMapper();
		$this->view->txt = $translationsMapper->getLanguage($language);
		
		// retrieve de Min and Max prices per night and per week from the database
		$ratesApptMapper = new Application_Model_RatesAppt1Mapper();
		$this->view->appt1MinNightRate = $ratesApptMapper->getMinNightRate();
		$this->view->appt1MaxNightRate = $ratesApptMapper->getMaxNightRate();
		$this->view->appt1MinWeekRate = $ratesApptMapper->getMinWeekRate();
		$this->view->appt1MaxWeekRate = $ratesApptMapper->getMaxWeekRate();
		
		$ratesApptMapper = new Application_Model_RatesAppt2Mapper();
		$this->view->appt2MinNightRate = $ratesApptMapper->getMinNightRate();
		$this->view->appt2MaxNightRate = $ratesApptMapper->getMaxNightRate();
		$this->view->appt2MinWeekRate = $ratesApptMapper->getMinWeekRate();
		$this->view->appt2MaxWeekRate = $ratesApptMapper->getMaxWeekRate();
		
		$ratesApptMapper = new Application_Model_RatesAppt3Mapper();
		$this->view->appt3MinNightRate = $ratesApptMapper->getMinNightRate();
		$this->view->appt3MaxNightRate = $ratesApptMapper->getMaxNightRate();
		$this->view->appt3MinWeekRate = $ratesApptMapper->getMinWeekRate();
		$this->view->appt3MaxWeekRate = $ratesApptMapper->getMaxWeekRate();
    }


}

