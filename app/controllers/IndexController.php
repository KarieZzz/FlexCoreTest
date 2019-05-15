<?php


namespace app\controllers;

use vendor\core\Controller;

/**
 * Class IndexController
 * @package app\controllers
 */
class IndexController extends Controller
{

    /**Вовзращение главной странички(статики, если не ошибаюсь)
     *
     */
    public function actionIndex()
    {
        //$menu = [
            //'news' => 'https://localhost:8080/news/index',
            //'products' => 'https://localhost:8080/product/list'
            //];
        //$result = $this->model->getNavigation();
        //$vars = [
        //    'news' => $result,
        //];
        $this->view->render('Главная страница');
    }
}