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
        $this->getUrlData();

        if(!$this->controller){
            require_once ROOTPATH . '/controllers/homeController.php';
            $this->controller = new HomeController();
            $this->controller->index();
            return;
        }
    }
    
    public function getUrlData()
    {
        if (isset($_GET['path'])){
            $path = $_GET['path'];
            $path = rtrim($path, '/');
            $path = filter_var($path, FILTER_SANITIZE_URL);
            $path = explode('/', $path);
            
            $this->controller = checkArray($path, 0);
            
            $this->action = checkArray($path, 1);
            
            if(checkArray($path, 2)){
                unset($path[0]);
                unset($path[1]);
                
                $this->params = array_values($path);
            }
        }
    }
}