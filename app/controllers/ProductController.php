<?php

namespace app\controllers;

use vendor\core\Controller;
use app\models\Product;

//TODO:Убрать мусор(ненужные методы во вьюхе),
// переделать автозагрузку(есть автоматический метод https://www.youtube.com/watch?v=1K7u4iposNc),
// обработать put delete update запросы
// поправить верстку, рекурсивно выводить результаты запросов

/**
 * Class ProductController
 * @package app\controllers
 */
class ProductController extends  Controller
{
    /**Метод подключения модели, передача результата запроса во вьюху, вывод вьюхи
     *
     */
    public function actionList()
    {
        $productModel = new Product;
        $result = $productModel->getList();
        $vars = [
            $result,
        ];
        $this->view->render('Страница продуктов', $vars);
    }
}