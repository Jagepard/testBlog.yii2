<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\helpers\Url;

class AdminController extends Controller
{
    public $title = 'TestBlog_yii2';

    public function beforeAction($action)
    {
        parent::beforeAction($action);

        return $this->redirect('login');
    }
}