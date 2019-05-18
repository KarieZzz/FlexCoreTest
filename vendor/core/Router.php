<?php


namespace vendor\core;
/**
 * Class Router
 */
class Router
{

    /**
     * @var
     */
    protected $routes;
    /**
     * @var
     */
    protected $params;

    /**
     * Router constructor.
     */
    public function __construct()
    {

        $routePath = '../app/components/routes.php';
        $arr = require_once($routePath);
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    /**
     * @param $route
     * @param $segments
     */
    public function add($route, $segments)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $segments;
    }

    /**Проверка на совпадение с таблицей маршрутов
     * @return bool
     */
    private function match()
    {

        $url = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {

                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * Функция обработки запроса, выполнение небходимого метода контроллера в зависимости от структуры запроса
     */
    public function run()
    {

        //Если запрашиваемый адрес совпадает с адресом из списка роутов, выполнение метода(экшна) контроллера
        if ($this->match()) {
            $path = '\app\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            //если искомый класс присутствует, обработка и инициализация контроллера
            if (class_exists($path)) {
                $action = (count($_POST) > 0) ?
                    'postAction' . ucfirst($this->params['action'])
                    : 'action' . ucfirst($this->params['action']);
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404);;
                }
            } else {
                View::errorCode(404);;
            }

        } else {
            View::errorCode(404);;
        }
    }
}