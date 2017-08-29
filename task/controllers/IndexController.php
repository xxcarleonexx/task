<?php


namespace task\controllers;


use task\controllers\web\Controller;

class IndexController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

}
