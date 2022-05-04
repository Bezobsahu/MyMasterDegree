<?php
mb_internal_encoding("UTF-8");

function autoloadFunction ($className)
{
	if (preg_match('/Controler$/', $className))
		require("controlers/" . $className.".php");
	else
		require("model/" . $className.".php");
}

spl_autoload_register("autoloadFunction");

//připojení k databázi
require_once 'model/comands/config.php';

Db::connect($host, $user, $password, $dbname);

//směrovač
$router = new RouterControler();
$router->process(array($_SERVER['REQUEST_URI']));

$router->showView();

