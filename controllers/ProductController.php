<?php
include_once '../models/ProductsModel.php';
function indexAction($smarty, $pdo)
{
    $productId = $_GET['id'] ?? null;
    $rsProduct = null;
    $rsProduct = getProductById($pdo, $productId);
    $smarty->assign('pageTitle', $rsProduct['name']);
    $smarty->assign('rsProduct', $rsProduct);
}
