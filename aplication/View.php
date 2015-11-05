<?php
/**
 * clase View es para las vistas
 */

class View{

	private $_controlador;
	private $_metodo;
	private $_layout;

	public function setLayout($layout){
		$this->_layout = $layout;
	}



	public function __construct(Request $peticion){
		$this->_controlador = $peticion->getControlador();
		$this->_metodo = $peticion->getmetodo();
		$this->_layout = DEFAULT_LAYOUT;
	}
	/**
	 * redirecciona a la vista solicitada
	 *
	 * @param  string $vista vista solicitada
	 * @return  vista 
	 * function redentizar(){
	 * 
	 * 
	 * }
	 * 
	 */
	public function renderizar($vista){
	 
		 $_layoutParams = array(
		 	'ruta_css'=>APP_URL.'views/layouts/'.$this->_layout.'/css/',
		 	'ruta_img'=>APP_URL.'views/layouts/'.$this->_layout.'/img/',
		 	'ruta_js'=>APP_URL.'views/layouts/'.$this->_layout.'/js/'
		 	);
		


		 $rutaView = ROOT.'views'.DS.$this->_controlador.DS.$vista.'.phtml';
		if(is_readable($rutaView)){
		
			
		    include_once ROOT.'views'.DS.'layouts'.DS.$this->_layout.DS.'header.php';    
          	include_once $rutaView;
			include_once ROOT.'views'.DS.'layouts'.DS.$this->_layout.DS.'footer.php';
			

		}else{
			throw new Exception("Error de Vista- view");
			
		}

		
    }
}