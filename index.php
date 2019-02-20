<?php
session_start();

require 'inc/Slim-2.x/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();



/** ************** VIEWS ******************* */

$app->get(

    '/',
	function() 
	{
        
		require_once("views/index.php");
		
    }//end function

);//END route





/****** APP RUN ******** */
$app->run();
