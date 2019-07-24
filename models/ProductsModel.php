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
