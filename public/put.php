<?php

ini_set("error_reporting", 1);
error_reporting(E_ALL);

require_once('../config/app.php');//initial config

require_once(CONFIG_PATH.'database.php');
require_once(CONFIG_PATH.'autoload.php');

$controller = new StaffController();

switch($_SERVER['REQUEST_METHOD']){
	case 'POST':
		$controller->updateData(); 
	    break;

}

/*

use application\controllers as Controller;
use application\models as Model;

$controller = new Controller\Base();
$model = new Model\Page();

*/

?>