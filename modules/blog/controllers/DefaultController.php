<?php

namespace app\modules\blog\controllers;

use app\modules\auth\models\User;
use yii\web\Controller;

class DefaultController extends BlogController
{
    public function actionIndex()
    {
        return $this->render('index', [
            'title' => ': Блог'
        ]);
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
}
