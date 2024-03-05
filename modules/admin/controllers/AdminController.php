<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

class AdminController extends Controller
{
    public $title = 'TestBlog_yii2';

    public function beforeAction($action)
    {
        if (empty(\Yii::$app->user->identity)) {
            return $this->redirect('login');
        }

        return parent::beforeAction($action);
    }
}
