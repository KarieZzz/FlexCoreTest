<?php

namespace app\controllers;

use vendor\core\Controller;

//TODO:Убрать мусор, доделать автозагрузку, сделать наследование, подключить БД
class ProductController extends  Controller
{
    public function actionList()
    {
        echo 'Test Product';
    }
}