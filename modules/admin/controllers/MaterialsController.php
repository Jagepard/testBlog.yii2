<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

class MaterialsController extends AdminController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
