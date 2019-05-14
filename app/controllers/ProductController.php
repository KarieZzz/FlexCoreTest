<?php

namespace app\controllers;

use vendor\core\Controller;

//TODO:Убрать мусор, переделать автозагрузку(есть автоматический метод), обработать put delete update запросы
class ProductController extends  Controller
{
    public function actionList()
    {
        echo 'Test Product';
    }
}