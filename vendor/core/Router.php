<?php

/**
 * Class Router
 */
class Router
{

    /**
     * @var
     */
    private $routes;

    /**
     * Router constructor.
     */
    public function __construct()
    {

        $routePath = '../vendor/core/components/routes.php';
        $this->routes = require_once($routePath);
    }

    /**
     * Функция получения строки запроса
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
     * Функция обработки запроса, выполнение небходимого метода контроллера в зависимости от структуры запроса
     */
    public function ShowResult()
    {
        //Получение строки запроса
        $requestedURI = $this->getURI();
        //Составление списка роутов, и проверка соответствия с запросом
        foreach ($this->routes as $uriFromList => $pathForURI) {
            //Если запрашиваемый адрес совпадает с адресом из списка роутов, выполнение действия(экшна) контроллера
            if (preg_match("~$uriFromList~", $requestedURI)) {

                //разделение названия контроллера и метода
                $controllerAndAction = explode('/', $pathForURI);

                //обработка и удаление первого элемента из массива, увеличение регистра первого символа
                $controllerName = ucfirst(array_shift($controllerAndAction).'Controller');

                //аналогичное действие для названия метода
                $actionName = 'action'.ucfirst(array_shift($controllerAndAction));

                //подключение контроллера в зависимости от запроса
                $controllerFile = '../app/controllers/'.$controllerName.'.php';

                //если искомый файл присутствует, включение его в класс роутера
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                //создание объекта, вызов метода
                $controllerObj = new $controllerName;
                $result = $controllerObj->$actionName();
                if ($result != null) {
                    break;
                }
            }
        }

    }
}