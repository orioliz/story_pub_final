<?php 
	
	
	//Determinamos su namespace
	namespace X;
	// autoload
	require_once __DIR__.'/sys/autoload.php';
	
	define('DS',DIRECTORY_SEPARATOR);
	define('ROOT', realpath(__DIR__).DS);
	define('APP', ROOT.'app'.DS);
	define('APP_W', dirname($_SERVER['PHP_SELF']).DS);
	define('CSS',APP_W.'pub'.DS.'css'.DS);
	define('JS',APP_W.'pub'.DS.'js'.DS);
	define('IMAGE',APP_W.'pub'.DS.'images'.DS);
	define('DATA',ROOT.'histories'.DS);
