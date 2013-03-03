<?php

class Zend_View_Helper_Language extends Zend_View_Helper_Abstract 
{
	public function language() 
	{
		$div_EN = '<div class="lang_en"></div>';
		$div_PT = '<div class="lang_pt"></div>';
		$div_FR = '<div class="lang_fr"></div>';
		/*$div_ES = '<div class="lang_es"></div>';*/
		$div_DE = '<div class="lang_de"></div>';
		
		$lang_select = '<a href="'.$this->view->url(array('controller'=>'language', 'action'=>'set', 'lang'=>'en')).'">'.$div_EN.'</a>';
		$lang_select .= '<a href="'.$this->view->url(array('controller'=>'language', 'action'=>'set', 'lang'=>'pt')).'">'.$div_PT.'</a>';
		$lang_select .= '<a href="'.$this->view->url(array('controller'=>'language', 'action'=>'set', 'lang'=>'fr')).'">'.$div_FR.'</a>';
		/*$lang_select .= '<a href="'.$this->view->url(array('controller'=>'language', 'action'=>'set', 'lang'=>'es')).'">'.$div_ES.'</a>';*/
		$lang_select .= '<a href="'.$this->view->url(array('controller'=>'language', 'action'=>'set', 'lang'=>'de')).'">'.$div_DE.'</a>';
		
		return $lang_select;
	}
}