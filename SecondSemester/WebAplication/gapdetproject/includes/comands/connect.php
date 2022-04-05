<?php
// https://www.phptutorial.net/php-pdo/php-pdo-mysql/

require_once 'config.php';

function connect($host, $db, $user, $password)
{
	$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

	try {
		$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

		return new PDO($dsn, $user, $password, $options);
	} catch (PDOException $e) {
		die($e->getMessage());
	}
}

return connect($host, $db, $user, $password);