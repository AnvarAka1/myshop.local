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
