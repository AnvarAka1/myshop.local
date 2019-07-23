<?php
// include defined paths in variables and postfixes
// also include common functions
include_once '../config/config.php';
include_once '../config/db.php'; // database
include_once '../library/mainFunctions.php';

// getting the controller name and the action in that controller
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'index';
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';


loadPage($smarty, $pdo, $controllerName, $actionName);
