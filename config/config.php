<?php


	/** start seasions. */
	session_start();

	ob_start();

	/** MySQL database name */
	define('DB_NAME', 'pto');

	/** MySQL database username */
	define('DB_USER', 'root');

	/** MySQL database password */
	define('DB_PASSWORD', '');

	/** MySQL hostname */
	define('DB_HOST', 'localhost');


	/** AppRoot */

	define('Path', dirname(dirname(__FILE__)));

	define('URL', dirname(__DIR__));


    require_once(URL. '\helpers\Message.php'); 

    require_once('Database.php');



    spl_autoload_register(function ($class_name) {

		  require_once(URL . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'Class' .  DIRECTORY_SEPARATOR .  $class_name . '.php');
		   

	});
















?>
