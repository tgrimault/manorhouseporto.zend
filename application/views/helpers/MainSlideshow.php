<?php

class Zend_View_Helper_MainSlideshow extends Zend_View_Helper_Abstract 
{
	public function mainSlideshow() 
	{
		$slideshow = '<ul class="ppt_main">
						<li><img src="'.$this->view->baseUrl('img/main/vue_gaia2.jpg').'" alt="1"></img></li>
						<li><img src="'.$this->view->baseUrl('img/main/Ponte.jpg').'" alt="2"></img></li>
						<li><img src="'.$this->view->baseUrl('img/main/rua don hugo.jpg').'" alt="3"></img></li>
						<li><img src="'.$this->view->baseUrl('img/main/descente.jpg').'" alt="4"></img></li>
						<li><img src="'.$this->view->baseUrl('img/main/exterior2.jpg').'" alt="5"></img></li>
						<li><img src="'.$this->view->baseUrl('img/main/vista dos quartos3.jpg').'" alt="6"></img></li>
						<li><img src="'.$this->view->baseUrl('img/main/balcon.jpg').'" alt="7"></img></li>
						<li><img src="'.$this->view->baseUrl('img/main/jardimnoitevista.jpg').'" alt="2"></img></li>
						<li><img src="'.$this->view->baseUrl('img/main/vista para o rio.jpg').'" alt="8"></img></li>
						<li><img src="'.$this->view->baseUrl('img/main/feuxArtifice.jpg').'" alt="9"></img></li>
						<li><img src="'.$this->view->baseUrl('img/main/feuxPont.jpg').'" alt="10"></img></li>
						<li><img src="'.$this->view->baseUrl('img/main/praia de Miramar.jpg').'" alt="11"></img></li>
					</ul>';
				
		
		return $slideshow;
	}
}