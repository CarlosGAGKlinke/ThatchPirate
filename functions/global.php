<?php
/**
 * Created by jonathan
 * Date: 12/06/2016
 * Time: 10:36
 */

function checkArray($array, $key)
{
    if(isset($array[$key]) && ! empty($array[$key])){
        return $array[$key];
    }
}

function __autoload($class)
{
    $file = ROOTPATH.'/classes/'.$class.'.class.php';

    if(!file_exists($file)){
        echo "Erro 404: fpágina não encontrada";
        require_once ROOTPATH.'/includes/404.php';
        return;
    }
    require_once $file;
}