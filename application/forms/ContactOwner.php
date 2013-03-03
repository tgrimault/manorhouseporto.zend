<?php

class Application_Form_ContactOwner extends Zend_Form
{

    public function init()
    {
        $session = Zend_Registry::get('session');
		$language = $session->language;
		$translationsMapper = new Application_Model_TranslationsMapper();
		$txt = $translationsMapper->getLanguage($language);
		
		$date_formDecorators = array(	'FormElements',
                        				array('decorator'=>array('1er'=>'HtmlTag'),'options'=>array('tag'=>'div', 'class'=>'date')));
		$elementDecorators = array(array('ViewHelper'),
                           array('Errors', array('placement' => 'prepend')),
                           array('label',array('tag' => 'p')));
						   
		/* Form Elements & Other Definitions Here ... */
		$this->setName("contactOwner");
        $this->setMethod('post');
		$this->setAction('/appt/index');
		
		///////////////////
		$lastname = $this->createElement('text', 'lastname');
		$lastname	->setRequired(true)
					->addErrorMessage($txt['lastname_empty'])
					->setLabel($txt['lastname'].'(*):')
					->addValidator(new Zend_Validate_Alnum(array('allowWhiteSpace' => true)));	
		$this->addElement($lastname);
		$lastname->setDecorators($elementDecorators);
		
		///////////////////
		$email = $this->createElement('text', 'email');
		$email	->setLabel('Email(*):')
				->setRequired(true)
				->addErrorMessage($txt['email_empty'])
				->addValidator(new Zend_Validate_EmailAddress(array(
																'allow' => Zend_Validate_Hostname::ALLOW_DNS,
																'mx'    => true)));	
		$this->addElement($email);
		$email->setDecorators($elementDecorators);
		
		///////////////////
		$tablePays = new Application_Model_PaysMapper();
		$listePays = $tablePays->fetchAll();
		$pays = new Zend_Form_Element_Select('pays');
		$pays	->setLabel($txt['country'].':')
				->setRequired(true);
		foreach ($listePays as $p) {
			if ($language == 'fr') {
				$pays->addMultiOption($p->getId(), $p->getFr());
			} else {
				$pays->addMultiOption($p->getId(), $p->getEn());
			}
		}
		$this->addElement($pays);
		$pays->setDecorators($elementDecorators);
		
		///////////////////
		$phone = $this->createElement('text', 'phone');
		$phone	->setLabel($txt['phone'].':');	
		$this->addElement($phone);
		$phone->setDecorators($elementDecorators);
		
		///////////////////
		$annees = array();
		for ($i=2011; $i<=2030; $i++) $annees[$i] = $i;
		
		$jours = array();
		for ($i=1; $i<=31; $i++) $jours[$i] = $i;
		
		$liste_mois = array('01' =>	$txt['janvier'],
							'02' =>	$txt['fevrier'],
							'03' =>	$txt['mars'],
							'04' =>	$txt['avril'],
							'05' =>	$txt['mai'],
							'06' =>	$txt['juin'],
							'07' =>	$txt['juillet'],
							'08' =>	$txt['aout'],
							'09' =>	$txt['septembre'],
							'10' =>	$txt['octobre'],
							'11' =>	$txt['novembre'],
							'12' =>	$txt['decembre']);
		 
		$jourA = new Zend_Form_Element_Select('jourA');
		$jourA	->setLabel($txt['arrival_date'].': ')
				->addMultiOptions($jours);
		$this->addElement($jourA);
		$jourA->setDecorators($elementDecorators);
		
		$moisA = new Zend_Form_Element_Select('moisA');
		$moisA	->addMultiOptions($liste_mois);
		$this->addElement($moisA);
		$moisA->setDecorators($elementDecorators);
		
		$anneeA = new Zend_Form_Element_Select('anneeA');
		$anneeA	->addMultiOptions($annees);
		$this->addElement($anneeA);
		$anneeA->setDecorators($elementDecorators);
		
		///////////////////
		$jourD = new Zend_Form_Element_Select('jourD');
		$jourD	->setLabel($txt['departure_date'].': ')
				->addMultiOptions($jours);
		$this->addElement($jourD);
		$jourD->setDecorators($elementDecorators);
		
		$moisD = new Zend_Form_Element_Select('moisD');
		$moisD	->addMultiOptions($liste_mois);
		$this->addElement($moisD);
		$moisD->setDecorators($elementDecorators);
		
		$anneeD = new Zend_Form_Element_Select('anneeD');
		$anneeD	->addMultiOptions($annees);
		$this->addElement($anneeD);
		$anneeD->setDecorators($elementDecorators);
		
		///////////////////
		$nb_pers = $this->createElement('text', 'nb_pers');
		$nb_pers	->setLabel($txt['nb_pers'].':')
					->addValidator(new Zend_Validate_Digits());	
		$this->addElement($nb_pers);
		$nb_pers->setDecorators($elementDecorators);
		
		///////////////////
		$message = $this->createElement('textarea', 'message');
		$message	->setAttrib('cols', '35')
    				->setAttrib('rows', '4')
					->setLabel($txt['message'].':');	
		$this->addElement($message);
		$message->setDecorators($elementDecorators);
		
		///////////////////
		$appt = $this->createElement('hidden', 'appt');
		$appt	->addValidator(new Zend_Validate_Digits());	
		$this->addElement($appt);
		$appt->setDecorators($elementDecorators);
		
		
		///////////////////
		$this->addDisplayGroup(array('jourA', 'moisA', 'anneeA'), 'dateA');
		$this->addDisplayGroup(array('jourD', 'moisD', 'anneeD'), 'dateD');
		
		$dateA = $this->getDisplayGroup('dateA');
		$dateA->setDecorators($date_formDecorators);
		$dateD = $this->getDisplayGroup('dateD');
		$dateD->setDecorators($date_formDecorators);
		
		///////////////////
		$this->addElement('submit', 'send', array(
            'required' => false,
            'ignore'   => true,
            'label'    => $txt['send'])); 
		
    }


}

