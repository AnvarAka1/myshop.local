<?php
include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';



function indexAction($smarty, $pdo)
{
    $itemId = $_GET['id'] ?? null;
    if ($itemId == null) {
        exit();
    }
    $rsProduct = null;

    //must be included in every controller because it should be available in every page (see header.tpl)
    $rsCategories = getAllMainCatsWithChildren($pdo);
    $rsProduct = getProductById($pdo, $itemId);

    $smarty->assign('itemInCart', 0);
    if (in_array($itemId, $_SESSION['cart'])) {
        $smarty->assign('itemInCart', 1);
    }
    $smarty->assign('pageTitle', $rsProduct['name']);
    //must be included in every controller because it should be available in every page (see header.tpl)
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProduct', $rsProduct);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
}
