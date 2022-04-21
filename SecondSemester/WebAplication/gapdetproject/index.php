<?php
mb_internal_encoding("UTF-8");

function autoloadFunction ($className)
{
	if (preg_match('/Controler$/', $className))
		require("controlers/" . $className.".php");
	else
		require("models/" . $className.".php");
}

spl_autoload_register("autoloadFunction");

$router = new RouterControler();
$router->process(array($_SERVER['REQUEST_URI']));

$router->showView();