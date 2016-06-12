<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 11/06/2016
 * Time: 12:47
 */
// Define se o código está em desenvolvimento para utilização em outros arquivos
define('DEVMODE', true);

// Constantes úteis padrões
define('ROOTPATH', dirname(dirname(__FILE__)));
define('HOMEURI', $_SERVER['SERVER_NAME']);

// Definições do banco de dados
define('HOST', 'localhost');
define('DBNAME', 'thatchpirate');
define('DBUSER', 'root');
define('DBPASS', '');

//echo ROOTPATH;

// Request load.php
require_once '/../load.php';