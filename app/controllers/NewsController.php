<?php

namespace app\controllers;

use vendor\core\Controller;
use app\models\News;

class NewsController extends Controller
{
    public function actionIndex()
    {
        //$vars = ['lol'];
        $this->setModel(new News);
        $result = $this->model->getNews();
        $vars = [
            'news' => $result,
        ];
        $this->view->render('Главная страница', $vars);
    }

    public function postActionIndex()
    {
        $vars=[
            'login' => $_POST['login'],
            'password' => $_POST['password']
        ];
        $this->view->render('Должна быть аутентификация пост запроса', $vars);

    }
}