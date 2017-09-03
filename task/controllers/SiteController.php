<?php


namespace task\controllers;


use task\controllers\web\Controller;

class SiteController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

}
