<?php
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';



// show Subcategories or products
function indexAction($smarty, $pdo)
{
    $catId = $_GET['id'] ?? null;
    if ($catId == null) {
        exit();
    }
    $rsChildCats = null;
    $rsProducts = null;

    // get particular category
    $rsCategory = getCatById($pdo, $catId);

    if ($rsCategory['parent_id'] == 0) {
        $rsChildCats = getChildrenForCat($pdo, $catId);
    } else {
        $rsProducts = getProductsByCat($pdo, $catId);
    }

    $rsCategories = getAllMainCatsWithChildren($pdo);

    $smarty->assign("pageTitle", 'Товары категории' . $rsCategory['name']);
    $smarty->assign("rsCategory", $rsCategory);
    $smarty->assign("rsProducts", $rsProducts);
    $smarty->assign("rsChildCats", $rsChildCats);

    $smarty->assign("rsCategories", $rsCategories);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'category');
    loadTemplate($smarty, 'footer');
}
