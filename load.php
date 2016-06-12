<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 11/06/2016
 * Time: 13:20
 */

session_start();

$session_time = 2 * 60 * 60; // 2 horas
session_set_cookie_params($session_time);


// Se DEVMODE for igual a falso ou não estiver definido esconde erros
if(DEVMODE === false || !defined('DEVMODE')){
    error_reporting(0);
    ini_set("display_errors", 0);
} else {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

require_once ROOTPATH . '/functions/global.php';

$thatch = new ThatchPirate();