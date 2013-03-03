<?php

class Zend_View_Helper_ApptSlideshow extends Zend_View_Helper_Abstract 
{
	public function apptSlideshow($appt) 
	{
		switch($appt) {
			case '1':
				$slideshow = '<ul class="ppt">
						<li><img src="'.$this->view->baseUrl('img/appt1/sala02.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt1/sala.jpg').'" alt="2"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt1/sala-vista.jpg').'" alt="3"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt1/quarto3.jpg').'" alt="4"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt1/quarto03.jpg').'" alt="5"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt1/quarto2.jpg').'" alt="6"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt1/sala-de-jantar.jpg').'" alt="7"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt1/quartonb21.jpg').'" alt="7"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt1/quartonb22.jpg').'" alt="7"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt1/quartonb23.jpg').'" alt="7"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt1/quartonb24.jpg').'" alt="7"></img></li>
						<li><img src="'.$this->view->baseUrl('img/feuxPont.jpg').'" alt="10"></img></li>
					</ul>';
				break;
				
			case '2':
				$slideshow = '<ul class="ppt">
						<li><img src="'.$this->view->baseUrl('img/appt2/sala_de_estar.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt2/sala de estar3.jpg').'" alt="2"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt2/sala de estar5.jpg').'" alt="3"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt2/sala de estar8.jpg').'" alt="4"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt2/sala de estar10.jpg').'" alt="5"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt2/quarto de casal.jpg').'" alt="6"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt2/cozinha4.jpg').'" alt="8"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt2/cozinha5.jpg').'" alt="9"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt2/quarto do fundo2.jpg').'" alt="11"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt2/quarto do fundo3.jpg').'" alt="12"></img></li>
						<li><img src="'.$this->view->baseUrl('img/feuxPont.jpg').'" alt="10"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt2/vista geral da casa do jardim da Xana.jpg').'" alt="12"></img></li>
					</ul>';
				break;
			
			case '3':
				$slideshow = '<ul class="ppt">
						<li><img src="'.$this->view->baseUrl('img/appt3/terrasse1.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt3/terrasse2.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt3/terrasse3.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt3/terrasse4.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt3/terrasse5.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt3/tablenuit.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt3/tablenuit2.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt3/jardinnuit.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt3/sala1.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt3/sala2.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt3/sala3.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt3/ch1.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt3/ch12.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt3/ch21.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt3/ch22.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/appt3/ch31.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/feuxPont.jpg').'" alt="10"></img></li>
					</ul>';
				break;
				
			case '4':
				$slideshow = '<ul class="ppt">
						<li><img src="'.$this->view->baseUrl('img/appt4/ribeira.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/feuxPont.jpg').'" alt="10"></img></li>
					</ul>';
				break;
				
			default:
				$slideshow = '';
		}
		
		return $slideshow;
	}
}