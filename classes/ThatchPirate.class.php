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

        if(!file_exists(ROOTPATH.'/controllers/'.$this->controller.'.php')){
            require_once ROOTPATH.$this->not_found;
            return;
        }

        require_once ROOTPATH.'/controllers/'.$this->controller.'.php';

        $this->controller = preg_replace( '/[^a-zA-Z]/i', '', $this->controller );
        
        if(!class_exists($this->controller)){
            require_once ROOTPATH.$this->not_found;
            return;
        }
        
        $this->controller = new $this->controller ($this->params);

        if(method_exists($this->controller, $this->action)){
            $this->controller->{$this->action}($this->params);
            return;
        }
        if(!$this->action && method_exists($this->controller, 'index')){
            $this->controller->index($this->params);
            return;
        }

        require_once SOURCEPATH . $this->not_found;
        return;
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