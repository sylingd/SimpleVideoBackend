<?php
$cfg = [
	'namespace' => 'App\\',
	'database' => 'mysql',
	'template' => [
		'engine' => 'Sy\\Http\\Template',
		'auto' => false,
		'extension' => 'phtml'
	],
	'cache' => [
		'type' => 'yac',
		'prefix' => 'v_'
	],
	'mysql' => [
		'host' => 'localhost',
		'port' => 3306,
		'user' => 'root',
		'password' => 'root',
		'database' => 'test'
	],
	'modules' => ['Api'],
	'module' => 'Api',
	'charset' => 'UTF-8'
];
return [
	'product' => $cfg,
	'develop' => $cfg
];