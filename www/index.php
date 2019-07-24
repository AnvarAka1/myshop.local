<?php

//Starting the session
session_start();

//if in the session there is no cart array, then we need to create one
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// include defined paths in variables and postfixes
// also include common functions
include_once '../config/config.php';
include_once '../config/db.php'; // database
include_once '../library/mainFunctions.php';

// getting the controller name and the action in that controller
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'index';
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';


// initialize the variable with number of items in the cart
$smarty->assign('cartCntItems', count($_SESSION['cart']));

loadPage($smarty, $pdo, $controllerName, $actionName);
