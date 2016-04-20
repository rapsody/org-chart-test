<?php

ini_set("error_reporting", 1);
// Report all errors
error_reporting(E_ALL);

require_once('../config/app.php');//initial config

require_once(CONFIG_PATH.'database.php');
require_once(CONFIG_PATH.'autoload.php');


$controller = new StaffController();

$controller->show();


?>