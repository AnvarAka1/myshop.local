<?php
function loadPage($smarty, $pdo, $controllerName, $actionName = 'test')
{
    include_once PathPrefix . $controllerName . PathPostfix;

    $function = $actionName . "Action";
    $function($smarty, $pdo);
}

function loadTemplate($smarty, $templateName)
{
    $smarty->display($templateName . TemplatePostfix);
}

function d($value = null, $die = 1)
{
    echo "Debug: <pre>";
    print_r($value);
    echo "</pre>";
    if ($die) {
        die;
    }
}

function createSmartyRsArray($pdo, $sql)
{

    $smartyRs = array();
    foreach ($pdo->query($sql, PDO::FETCH_ASSOC) as $row) {
        $smartyRs[] = $row;
    }

    $smartyArray = isset($smartyRs) ? $smartyRs : false;
    return $smartyArray;
}
