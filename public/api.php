<?php

ini_set("error_reporting", 0);

require_once('../config/app.php');//initial config

require_once(CONFIG_PATH.'database.php');
require_once(CONFIG_PATH.'autoload.php');

$controller = new StaffController();

switch($_SERVER['REQUEST_METHOD']){
	case 'POST':
		$controller->update(); 
	    break;
	case 'GET':
	    $controller->index(); 
	    break;
}

/*

use application\controllers as Controller;
use application\models as Model;

$controller = new Controller\Base();
$model = new Model\Page();

*/

?>