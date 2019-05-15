<?php


namespace vendor\core;


/**
 * Class View
 * @package vendor\core
 */
class View
{
    /**
     * @var string
     */
    protected $path;
    /**
     * @var
     */
    protected $route;
    /**
     * @var string
     */
    protected $layout;

    /**
     * View constructor.
     * @param $route
     */
    public function __construct(array $route)
    {
        $this->setRoute($route);
        $this->setPath($route['controller'] . '/' . $route['action']);
    }

    /**обработка страницы, очистка буфера, подключение вьюхи
     * @param $title
     * @param array $vars
     */
    public function render($title, $vars = [])
    {
        extract($vars);
        $path = '../app/views/' . $this->path . '.php';
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            $layout = $this->setLayout()->getLayout();
            require '../app/views/layouts/' . $layout . '.php';
        }
    }

    /**
     * @param $url
     */
    public function redirect($url)
    {
        header('location: ' . $url);
        exit;
    }

    /**
     * @param $code
     */
    public static function errorCode($code)
    {
        http_response_code($code);
        $path = '../app/views/errors/' . $code . '.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }

    /**
     * @param $status
     * @param $message
     */
    public function message($status, $message)
    {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }

    /**
     * @param $url
     */
    public function location($url)
    {
        exit(json_encode(['url' => $url]));
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
     * @return string
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @param string $layout
     * @return $this
     */
    public function setLayout($layout = 'default')
    {
        $this->layout = $layout;
        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return $this
     */
    public function setPath(string $path)
    {
        $this->path = $path;
        return $this;
    }


}