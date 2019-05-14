<?php


namespace vendor\core;

use vendor\core\View;

abstract class Controller
{
    /**
     * @var
     */
    protected $route;
    protected $view;
    protected $model;

    public function __construct(array $route)
    {
        $this->setRoute($route);
        $this->setView(new View($route));
        //$this->setModel($this->loadModel($route['controller']));
    }

    /*public function loadModel(string $name)
    {
        $path = 'app\models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }*/

    public function getRoute()
    {
        return $this->route;
    }

    public function setRoute(array $route)
    {
        $this->route = $route;
        return $this;
    }

    public function getView()
    {
        return $this->view;
    }

    public function setView(View $view)
    {
        $this->view = $view;
        return $this;
    }

    public function getModel(){
        return $this->model;
    }

    public function setModel($model){
        $this->model = $model;
        return $this;
    }
}