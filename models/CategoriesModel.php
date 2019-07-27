<?php
function getChildrenForCat($pdo, $catId)
{
    $sql = "SELECT * from categories WHERE parent_id=$catId";

    $smartyRs = array();
    $smartyRs = createSmartyRsArray($pdo, $sql);
    return $smartyRs;
}

// Get the categories with subcategories from database and return them
// to the controller

function getAllMainCatsWithChildren($pdo)
{
    $sql = 'SELECT * FROM categories WHERE parent_id = 0';

    $smartyRs = array();
    foreach ($pdo->query($sql, PDO::FETCH_ASSOC) as $row) {
        $rsChildren = getChildrenForCat($pdo, $row['id']);

        if ($rsChildren) {
            $row['children'] = $rsChildren;
        }

        $smartyRs[] = $row;
    }

    return $smartyRs;
}

function getCatById($pdo, $catId)
{
    $catId = intval($catId);
    // select particular category by its id
    $sql = "SELECT * FROM `categories` WHERE `id`='{$catId}'";

    foreach ($pdo->query($sql, PDO::FETCH_ASSOC) as $row) {
        $rsResult = $row;
    }
    return $rsResult;
}
