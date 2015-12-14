<?php

ob_start();

// APPLICATION_PATH is a constant pointing to our application/ subdirectory.

// We use this to add our "library" directory to the include_path, so that 

// PHP can find our Zend Framework classes.

define('PATH', "./");

define('APPLICATION_PATH', realpath(dirname(__FILE__) . 'application/')); // application directory... outside Public folder..

define('SITE_PATH', realpath(dirname(__FILE__) . '/application/')); // application directory... outside Public folder..

define('APP_PATH', realpath(dirname(__FILE__)) . '/application/'); // application directory... outside Public folder..


$demo_hosts = array('demo.teeshirtscript.com', 'teeshirtscript.com');
if (isset($_SERVER['HTTP_HOST']) && in_array($_SERVER['HTTP_HOST'], $demo_hosts)) {
    define('TEESHIRTSCRIPT_ON_DEMO', true);
}else{
    define('TEESHIRTSCRIPT_ON_DEMO', false);
}

/*
set_include_path(APPLICATION_PATH . '/../library' . PATH_SEPARATOR . get_include_path());
set_include_path(APPLICATION_PATH . '/../application/models' . PATH_SEPARATOR . get_include_path());
set_include_path(APPLICATION_PATH . '' . PATH_SEPARATOR . get_include_path());
*/



//echo APPLICATION_PATH . 'application/form' . PATH_SEPARATOR;



set_include_path(APPLICATION_PATH . 'library' . PATH_SEPARATOR . get_include_path());

set_include_path(APPLICATION_PATH . 'application' . PATH_SEPARATOR . get_include_path());

set_include_path(APPLICATION_PATH . 'application/controllers' . PATH_SEPARATOR . get_include_path());

set_include_path(APPLICATION_PATH . 'application/models/' . PATH_SEPARATOR . get_include_path());

set_include_path(APPLICATION_PATH . '' . PATH_SEPARATOR . get_include_path());



// AUTOLOADER - Set up autoloading.

// This is a nifty trick that allows ZF to load classes automatically so

// that you don't have to litter your code with 'include' or 'require'

// statements.



$errMsg = array();

$succMsg = array();


/*
require_once "Zend/Loader.php";

Zend_Loader::registerAutoload();
*/
require_once 'Zend/Loader/Autoloader.php';
$loader = Zend_Loader_Autoloader::getInstance();
$loader->setFallbackAutoloader(true);

Zend_Session::start();

$mySession = new Zend_Session_Namespace('default');



// REQUIRE APPLICATION BOOTSTRAP: Perform application-specific setup

// This allows you to setup the MVC environment to utilize. Later you 

// can re-use this file for testing your applications.

// The try-catch block below demonstrates how to handle bootstrap 

// exceptions. In this application, if defined a different 

// APPLICATION_ENVIRONMENT other than 'production', we will output the 

// exception and stack trace to the screen to aid in fixing the issue



try {

    require 'application/Bootstrap.php';

} catch (Exception $exception) {

    echo '<html><body><center>'

       . 'An exception occured while bootstrapping the application.';

    if (defined('APPLICATION_ENVIRONMENT') && APPLICATION_ENVIRONMENT != 'production') {

        echo '<br /><br />' . $exception->getMessage() . '<br />'

           . '<div align="left">Stack Trace:' 

           . '<pre>' . $exception->getTraceAsString() . '</pre></div>';

    }

    echo '</center></body></html>';

    exit(1);

}





// DISPATCH:  Dispatch the request using the front controller.

// The front controller is a singleton, and should be setup by now. We 

// will grab an instance and dispatch it, which dispatches your 

// application.

/* $fcontroller=Zend_Controller_Front::getInstance() ;

$router = $fcontroller->getRouter();  





$appRoutes=array();

$appRoutes['varun']= new Zend_Controller_Router_Route('/varun',array('module'=> 'default','controller' => 'index','action' => 'support'));

						



					

foreach($appRoutes as $key=>$cRouter){

			

	$router->addRoute( $key,  $cRouter );

}

 */




$mySession = new Zend_Session_Namespace('default');

Zend_Controller_Front::getInstance()->dispatch();

ob_flush();