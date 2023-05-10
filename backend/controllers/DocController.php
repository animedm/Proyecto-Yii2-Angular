<?php

namespace backend\controllers;

use Yii;


class DocController extends \yii\web\Controller
{



    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction' ,
            ] 
        ];
    }

}
