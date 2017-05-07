<?php 

	namespace X\Sys;	

	use X\Sys\Request;
	use X\Sys\Session;

	class Core{

		static private $controller;
		static private $action;
		static private $params;

		public static function init(){
			Session::init();

			Request::exploding();

			self::$controller=Request::getVariable();
			self::$action=Request::getVariable();
			self::$params=Request::getParams();
			self::router();
		}
	


		static function router(){

			self::$controller=(self::$controller!="")?self::$controller:'home';
			self::$action=(self::$action!="")?self::$action:'home';
			$filename=strtolower(self::$controller).'.php';
			$fileroute=APP.'controllers'.DS.$filename;
			
			if(is_readable($fileroute)){
				$contr_class='\X\App\Controllers\\'.ucfirst(self::$controller);
				self::$controller=new $contr_class(self::$params);
				if(is_callable(array(self::$controller,self::$action))){

					call_user_func(array(self::$controller,self::$action));
				}else{
					echo '<br/><br/>'.self::$action.':Mètode inexistent';
				}

			}else{
				echo '<br/><br/>'. self::$controller.': Controlador inexistent';		
			}
		} // fin de router()

	} // fin de close