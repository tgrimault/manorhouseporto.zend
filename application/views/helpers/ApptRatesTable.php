<?php

class Zend_View_Helper_ApptRatesTable extends Zend_View_Helper_Abstract 
{
	public function apptRatesTable($appt)
	{
		$session = Zend_Registry::get('session');
		$language = $session->language;
		$translationsMapper = new Application_Model_TranslationsMapper();
		$txt = $translationsMapper->getLanguage($language);
		
		$result = '<table class="data">
	        <tr class="colgroups">
                <th class="period"></th>
                <th class="date" scope="col" colspan="2">'.$txt['dates'].'</th>
                <th class="rate" scope="col" colspan="2">'.$txt['rates'].'</th>
	        </tr>
            <tr class="cols">
                <th class="period"><span>'.$txt['name_of_period'].'</span></th>
                <th scope="col">'.$txt['begins'].'</th>
                <th scope="col">'.$txt['ends'].'</th>
                <th scope="col">'.$txt['week'].'</th>
                <th scope="col">'.$txt['night'].'</th>
            </tr>';	
			
		switch($appt) {
			case '1':
				$apptRatesMapper = new Application_Model_RatesAppt1Mapper();
				break;
			case '2':
				$apptRatesMapper = new Application_Model_RatesAppt2Mapper();
				break;
			case '3':
				$apptRatesMapper = new Application_Model_RatesAppt3Mapper();
				break;
			default:
				$result .= '</table>';
				return $result;	
		}
		
		$alternate = true;
		
		$rates = $apptRatesMapper->getLastRates();
		
		foreach ($rates as $rate) {
			if ($alternate) {
				$result .= '<tr class="alternate">';
			} else {
				$result .= '<tr>';	
			}
			$alternate = !$alternate;
			
           	$result .= '<th class="period">'.$txt[$rate->getPeriod()].'</th>';
			$result .= '<td class="period">'.$rate->getBegin().'</td>';
			$result .= '<td class="period">'.$rate->getEnd().'</td>';
			$result .= '<td class="period">€'.$rate->getWeek().'</td>';
			$result .= '<td class="period">€'.$rate->getNight().'</td>';
			$result .= '</tr>';
		}
		
		$result .= '</table>';
		
		$result .= '<p>*'.$txt['pers_supp'].'</p>';
		
		return $result;
	}
}
