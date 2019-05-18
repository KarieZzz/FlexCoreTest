<?php

namespace app\controllers;

use vendor\core\Controller;
use app\models\News;

/**
 * Class NewsController
 * @package app\controllers
 */
class NewsController extends Controller
{
    /**Метод подключения модели, передача результата запроса во вьюху, вывод вьюхи
     *
     */
    public function actionIndex()
    {

        $newsModel=new News;
        $result = $newsModel->getNews();
        $vars = [
            $result,
        ];
        $this->view->render('Страница новостей', $vars);
    }

    /**
     *
     */
    public function postActionIndex()
    {
        $vars=[
            'login' => $_POST['login'],
            'password' => $_POST['password']
        ];
        $this->view->render('Должна быть аутентификация пост запроса', $vars);

    }
}