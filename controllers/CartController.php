<?php

// Controller to work with the cart


// Models
include_once('../models/CategoriesModel.php');
include_once('../models/ProductsModel.php');


// gets ID as parameter and returns json file
/**
 * @param integer id GET parameter - ID of added product
 * @return json info about operation (success, number of elements in the cart) 
 */
function addtocartAction()
{
    $itemId = $_GET['id'] ?? null;
    if (!$itemId) {
        return false;
    }

    $resData = array();

    // if the value is not found, then we add
    if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false) {
        $_SESSION['cart'][] = $itemId;
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
    }
    // header("Content-type: application/json");

    echo json_encode($resData);
}
/**
 * Removing item from the cart
 * @param integer id GET parameter - ID of the product to be removed
 * 
 * @return json information about the operation (success, number of elements in the cart)
 */
function removefromcartAction()
{
    $itemId = $_GET['id'] ?? null;
    $itemId = intval($itemId);
    if (!$itemId) {
        exit();
    }
    $resData = array();
    $key = array_search($itemId, $_SESSION['cart']);
    if ($key !== false) {
        unset($_SESSION['cart'][$key]);
        $resData['success'] = 1;
        $resData['cntItems'] = count($_SESSION['cart']);
    } else {
        $resData['success'] = 0;
    }
    echo json_encode($resData);
}

function indexAction($smarty, $pdo)
{
    $itemsIds = $_SESSION['cart'] ?? array();

    $rsProducts = null;



    $rsCategories = getAllMainCatsWithChildren($pdo);
    $rsProducts = getProductsFromArray($pdo, $itemsIds);

    $smarty->assign('pageTitle', "Корзина");
    $smarty->assign('rsProducts', $rsProducts);
    $smarty->assign('rsCategories', $rsCategories);

    loadTemplate($smarty, "header");
    loadTemplate($smarty, "cart");
    loadTemplate($smarty, "footer");
}
