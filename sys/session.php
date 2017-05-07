<?php

	namespace X\Sys;
	

	Class Session{

		//iniciamos la variable de session
		static function init(){
			session_start();
			self::set('id',session_id());
		}

		//crea la variable 
		static function set($key,$value){
			$_SESSION[$key]=$value;
		}

		//recogemos 
		static function get(){
			if(self::exists($key)){
				return $_SESSION[$key];
			}else{
				return null;
			}
			
		}
		
		static function exists($key){
			if(array_key_exists($key, _SESSION)) {
				return true;
			} 
            else {
				return false;
			}
		}

		//borrmos la variable de session
		static function del($key){
			if(self::exists($key)){
				unset($_SESSION[$key]);
			}
		}
		
		//destruimos session
		static function destroy(){
			session_destroy();
		}
	}