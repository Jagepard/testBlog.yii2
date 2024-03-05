<?php

namespace app\modules\admin\controllers;

use yii\helpers\Url;
use yii\web\Controller;
use app\modules\admin\models\Materials;

class MaterialsController extends AdminController
{
    public function actionIndex()
    {
        $paginated = Materials::paginate(
            Materials::find()->where(['status' => 1])
        );

        return $this->render('index', [
            'title'     => ': Блог',
            'materials' => $paginated['materials'],
            'pages'     => $paginated['pages'],
        ]);
    }

    public function actionAdd()
    {      
        return $this->render('add', ['title' => ': Добавить материал',]);
    }

    public function actionCreate()
    {      
        $material = new Materials();
        $material->write($material);

        return $this->redirect(['materials/index']);
    }

    public function actionEdit($id)
    {      
        $material = Materials::findOne($id);

        return $this->render('edit', [
            'title'    => ': Редактировать ' . $material['title'],
            'material' => $material
        ]);
    }

    public function actionUpdate($id)
    {      
        $material = Materials::findOne($id);
        $material->write($material);

        return $this->redirect(['materials/index']);
    }

    public function actionDelete($id)
    {      
        $material = Materials::findOne($id);
        $material->delete();

        return $this->redirect(['materials/index']);
    }
}
