<?php


namespace vendor\core;

use vendor\core\View;

/**
 * Class Controller
 * @package vendor\core
 */
abstract class Controller
{
    /**
     * @var
     */
    protected $route;
    /**
     * @var
     */
    protected $view;
    /**
     * @var
     */
    protected $model;

    /**
     * Controller constructor.
     * @param array $route
     */
    public function __construct(array $route)
    {
        $this->setRoute($route);
        $this->setView(new View($route));

    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param array $route
     * @return $this
     */
    public function setRoute(array $route)
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param \vendor\core\View $view
     * @return $this
     */
    public function setView(View $view)
    {
        $this->view = $view;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param $model
     * @return $this
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }
}