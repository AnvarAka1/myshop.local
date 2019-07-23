<?php


// constants for accessing controllers
define("PathPrefix", "../controllers/");
define("PathPostfix", "Controller.php");


// usable template
$template = 'default';
// paths to files of the template
define("TemplatePrefix", "../views/{$template}/");
define("TemplatePostfix", ".tpl");

// paths to files of the template in web
define("TemplateWebPath", "/templates/{$template}/");

require('../library/Smarty/libs/Smarty.class.php');

$smarty = new Smarty(); 

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir("../tmp/smarty/templates_c");
$smarty->setCacheDir("../tmp/smarty/cache");
$smarty->setConfigDir("../library/Smarty/configs");
$smarty->assign('templateWebPath', TemplateWebPath);