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
    // foreach ($pdo->query($sql, PDO::FETCH_ASSOC) as $row) {
    //     $smartyRs[] = $row;
    // }
    $smartyRs = $pdo->query($sql, PDO::FETCH_ASSOC)->fetchAll();
    $smartyArray = isset($smartyRs) ? $smartyRs : false;
    return $smartyArray;
}

function prepareCreateSmartyRsArray($pdo, $sql, $paramsArray)
{
    $rs = $pdo->prepare($sql);
    $rs->execute($paramsArray);

    $smartyRs = array();
    $smartyRs = $rs->fetchAll(PDO::FETCH_ASSOC);
    return $smartyRs;
}

function redirect($url)
{
    if (!$url) {
        $url = '/';
    }
    header("Location: {$url}");
    exit;
}
