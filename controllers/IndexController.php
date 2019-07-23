<?php

include_once "../models/CategoriesModel.php";
include_once "../models/ProductsModel.php";
function testAction()
{
    echo 'IndexController > testAction';
}

function indexAction($smarty, $pdo)
{
    $rsCategories = getAllMainCatsWithChildren($pdo);
    $rsProducts = getLastProducts($pdo, 16);
    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}
