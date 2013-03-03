<?php

class ApptController extends Zend_Controller_Action
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
		
		$translationsMapper = new Application_Model_TranslationsMapper();
		$this->view->txt = $translationsMapper->getLanguage($language);
		
		$form = new Application_Form_ContactOwner();
		$appt = $this->getRequest()->getParam('appt');
		$data = array('appt' => $appt);			// set the default value for the hidden 'appt' parameter in the form
		$form->populate($data);
		
		$request = $this->getRequest();
		if ($request->isPost()) {
			if ($form->isValid($request->getPost())) {
				// recupere les donnees du formulaire
				$values = $form->getValues();
				
				// save the contact information in the database for future use (newsletter, ...)
				$tableContacts = new Application_Model_ContactsMapper();
				$contact = new Application_Model_Contacts();
				$contact	->setName($values['lastname'])
							->setEmail($values['email'])
							->setDate(date('Y-m-d'))
							->setPays($values['pays']);
				$tableContacts->save($contact);
				
				// configure the manorhouseporto.com's SMTP server
				$config = array('auth' => 'login', 
								'port' => 587,
								'username' => 'info@manorhouseporto.com', 
								'password' => 'saperpo1');
    			$transport = new Zend_Mail_Transport_Smtp('mail.manorhouseporto.com', $config);
				Zend_Mail::setDefaultTransport($transport);
				
				$tablePays = new Application_Model_PaysMapper();
				$pays = new Application_Model_Pays();
				$tablePays->find($values['pays'], $pays);
				
				// Create the contact email from the form's datas
				$notification = '<body>';
				$notification .= '<h1>Thank you for contacting Manor House Porto</h1>';
				$notification .= '<h1>* This is not a reservation *</h1>';
				$notification .= '<p>Your reservation request for the appartment #'.$values['appt'].' has been sent to the owner. He will contact you shortly.</p>';
				$notification .= '<h2>----------------------------------------</h2>';
				$notification .= '<span>Name: </span>'.$values['lastname'].'<br>';
				$notification .= '<span>Email: </span>'.$values['email'].'<br>';
				$notification .= '<span>Phone: </span>'.$values['phone'].'<br>';
				$notification .= '<span>Number of guests: </span>'.$values['nb_pers'].' from '.$pays->getEn().'<br>';
				$notification .= '<span>Expected arrival date: </span>'.$values['jourA'].'-'.$values['moisA'].'-'.$values['anneeA'].'<br>';
				$notification .= '<span>Expected departure date: </span>'.$values['jourD'].'-'.$values['moisD'].'-'.$values['anneeD'].'<br>';
				$notification .= '<p>Message: </p>';
				$notification .= '<p>'.$values['message'].'</p>';
				$notification .= '<h2>----------------------------------------</h2>';
				$notification .= '</body>';
				
				// prepare and send the email
				$groupmailMapper = new Application_Model_GroupmailMapper();
				$recipientList = $groupmailMapper->fetchAll();
				
				$mail = new Zend_Mail('utf-8');
				$mail->setReplyTo('info@manorhouseporto.com', 'Manor House Porto');
				$mail->addHeader('MIME-Version', '1.0');
				$mail->addHeader('Content-Transfer-Encoding', '8bit');
				$mail->addHeader('X-Mailer:', 'PHP/'.phpversion());
				$mail->setBodyHtml($notification);
				$mail->setFrom('info@manorhouseporto.com', 'Manor House Porto');
				$mail->addTo($values['email'], $values['lastname']);
				$mail->addTo('info@manorhouseporto.com', 'Manor House Porto');
				foreach ($recipientList as $recipient) {
					$mail->addBcc($recipient->getEmail(), $recipient->getName());
				}
				$mail->addCc($values['email'], $values['lastname']);
				$mail->setSubject('Reservation request - Manor House Porto');
				$mail->send();
			}
		}
		
		$this->view->form = $form;
		$this->view->appt = $appt;
    }
}



