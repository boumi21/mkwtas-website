<?php

// Connection to database

$dbconfig = parse_ini_file(__DIR__ . '/../settings/config.ini', true)['database'];

$dsn = "mysql:host=" . $dbconfig['host'] . ";dbname=" . $dbconfig['dbname'] . ";charset=utf8";

try {
	$bdd = new PDO($dsn, $dbconfig['user'], $dbconfig['password']);
	$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
	// TODO : Redirect to error page if error
	die('Error : ' . $e->getMessage());
}
?>