<?php
//Тот самый FrontController, в котором идет вызов роутера, подключение к БД, подключение файлов системы и общие настройки

//1.Files
require_once('../vendor/core/Router.php');

$router=new Router;
$router->ShowResult();
echo "привет!";