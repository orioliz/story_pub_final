<?php 	

	namespace X\Sys;


	Class View extends \ArrayObject{
		protected $output;
		protected $dataTable;
        
		//funcion para contruir la clase
		public function __construct($dataView, $dataTable=null){
			//llamamos a la funcion contruct
			parent::__construct($dataView,\ArrayObject::ARRAY_AS_PROPS);
			if ($dataTable!=null){
				$this->dataTable=$dataTable;
			}
			
		}
		//funcion para renderizar plantillas
		public function render($fileview){
			ob_start();
	 		include APP.'tpl'.DS.$fileview;
	 		return ob_get_clean();
		}

		function show(){
			echo $this->output;
		}
	}