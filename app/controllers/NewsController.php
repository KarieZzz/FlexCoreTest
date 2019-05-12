<?php

namespace app\controllers;

use vendor\core\Controller;

class NewsController extends Controller
{
    public function actionIndex()
    {
        $result = $this->model->getNews();
        $vars = [
            'news' => $result,
        ];
        $this->view->render('Главная страница', $vars);
    }
}