<?php

/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 12/06/2016
 * Time: 09:55
 */
class ThatchPirate
{
    private $controller;

    private $action;

    private $params;

    private $not_found = '/includes/404.php';
    
    public function __construct()
    {
        $tst = $this->getUrlData();
        echo $tst;
    }
    
    public function getUrlData()
    {
        if (isset($_GET['path'])){
            $path = $_GET['path'];
            $path = rtrim($path, '/');
            $path = filter_var($path, FILTER_SANITIZE_URL);
            $path = explode('/', $path);
            
            $this->controller = 
        }
    }
}