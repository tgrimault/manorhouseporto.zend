<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	/**
    * Initialize default language (detected from the browser's settings)
    *
    */
	protected function _initLanguage()
	{
		$locale = new Zend_Locale();
		// if locale is 'de_AT' then 'de' will be returned as language
		$language = $locale->getLanguage();
		
		$session = new Zend_Session_Namespace('Default');
		Zend_Registry::set('session', $session);

		if (isset($session->language)) {} else {
			if (($language == 'en') || ($language == 'fr') || ($language == 'de')) {
				$session->language = $language;
			} else {
				$session->language = 'en';		// default language is English
			}
		}
	}

}

