<?php
//Model for getting products from the database


function getLastProducts($pdo, $limit = null)
{
    $sql = "SELECT * from `products` ORDER BY `id` DESC";
    if ($limit) {
        $sql .= " LIMIT {$limit}";
    }
    return createSmartyRsArray($pdo, $sql);
}
function getProductsByCat($pdo, $catId)
{
    $catId = intval($catId);
    $sql = "SELECT * FROM `products` WHERE `category_id`={$catId}";
    return createSmartyRsArray($pdo, $sql);
}
function getProductById($pdo, $productId)
{
    $productId = intval($productId);
    $sql = "SELECT * FROM `products` WHERE `id`='{$productId}'";

    foreach ($pdo->query($sql, PDO::FETCH_ASSOC) as $row) {
        $rsProduct = $row;
    }
    return $rsProduct;
}


/**
 * Get a list of products from the array of ids
 * @param array $itemsIds an array of ids of products
 * @return array of products
 */
function getProductsFromArray($pdo, $itemsIds)
{

    if (!count($itemsIds)) {
        return;
    }
    $strIds = implode(', ', $itemsIds);
    // d($strIds); 
    $sql = "SELECT * FROM `products` WHERE `id` in ({$strIds})";

    return createSmartyRsArray($pdo, $sql);
}
