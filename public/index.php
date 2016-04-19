<?php

ini_set("error_reporting", 1);
// Report all errors
error_reporting(E_ALL);

require_once('../config/app.php');//initial config

require_once(CONFIG_PATH.'database.php');
require_once(CONFIG_PATH.'autoload.php');



//if (isset($_GET['api']) ) {
if ($_GET['api'] == "staff" ) {
	$controller = new StaffController();

	switch($_SERVER['REQUEST_METHOD']){
		case 'POST':
		    $controller->update(); 
		    break;
		case 'GET':
		    $controller->index(); 
		    break;
	}
   // $controller = $_GET['api'];

	/*


	use application\controllers as Controller;
	use application\models as Model;

	...

	$controller = new Controller\Base();
	$model = new Model\Page();



	*/

	


  } else {
   

	$controller = new StaffController();

	$controller->show();
  }



?>