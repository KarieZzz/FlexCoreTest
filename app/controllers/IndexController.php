<?php


namespace app\controllers;

use vendor\core\Controller;

class IndexController extends Controller
{

    public function actionIndex()
    {
        $vars = ['lol'];
        //$result = $this->model->getNavigation();
        //$vars = [
        //    'news' => $result,
        //];
        $this->view->render('Главная страница', $vars);
    }
}