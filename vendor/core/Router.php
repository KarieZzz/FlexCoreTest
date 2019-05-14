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
    public function add($route, $segments) {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $segments;
    }

    /**
     * Функция получения строки запросаsegments
     * @return string
     */
    private function getURI()
    {
        //Если строка запроса не пустая
        if (!empty($_SERVER['REQUEST_URI'])) {
            //Возвращение строки из массива, с разделителем
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /**
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

        //Если запрашиваемый адрес совпадает с адресом из списка роутов, выполнение действия(экшна) контроллера
        if ($this->match()) {

            //убрать костыль
            //$controllerAndActionWithParameters = explode('/', $this->segments);
            //обработка и удаление первого элемента из массива, увеличение регистра первого символа
            //$controllerName = ucfirst(array_shift($controllerAndActionWithParameters) . 'Controller');
            //аналогичное действие для названия метода
            //$actionName = 'action' . ucfirst(array_shift($controllerAndActionWithParameters));
            //подключение контроллера в зависимости от запроса
            //$controllerFile = '../app/controllers/' .ucfirst($this->params['controller']).'Controller.php';
            $path = '\app\controllers\\'.ucfirst($this->params['controller']).'Controller';
            //если искомый файл присутствует, включение его в класс роутера
            if (class_exists($path)) {
                $action = 'action'.ucfirst($this->params['action']);
                if (method_exists($path, $action)) {
                    //$controller = new $controllerName($this->segments);
                    //$controller->$actionName();
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