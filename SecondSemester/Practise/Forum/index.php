<?php

session_start();
$_SESSION['login'];

mb_internal_encoding("UTF-8");//nastavení češtiny

//vlastní autoloader
function autoloadFunction ($className)
{
	if (preg_match('/Controler$/', $className))
		require("controlers/" . $className.".php");
	else
		require("models/" . $className.".php");
}

spl_autoload_register("autoloadFunction");

//připojení k databázi

Db::connect('localhost', 'projekt', 'projekt', 'forumlike');




//směrovač
$router = new RouterControler();
$router->process(array($_SERVER['REQUEST_URI']));

$router->showView();