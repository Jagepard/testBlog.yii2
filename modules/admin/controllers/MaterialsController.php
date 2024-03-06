<?php

namespace app\modules\admin\controllers;

use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\modules\admin\models\Materials;
use app\modules\admin\models\UploadImage;

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
        $upload        = new UploadImage();
        $upload->image = UploadedFile::getInstance($upload, 'image');
        $imgName       = ($upload->image) ? time() . '_' . $upload->image->name : '';

        $material = new Materials();
        $material->image = $imgName;
        $material->setAttributes(\Yii::$app->request->post());
        $material->write($material);

        if ($upload->image) {
            $upload->upload($imgName);
        }
        
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
        $upload        = new UploadImage();
        $upload->image = UploadedFile::getInstance($upload, 'image');

        $material = Materials::findOne($id);
        $material->setAttributes(\Yii::$app->request->post());
        $imgName  = ($upload->image) ? time() . '_' . $upload->image->name : $material->image;

        if ($upload->image) {
            $upload->upload($imgName);
            if (!empty($material->image)) {
                $this->removeImg(\Yii::$app->basePath . '/web/uploads/' . $material->image);
                $this->removeImg(\Yii::$app->basePath . '/web/uploads/thumb/' . $material->image);
            }
        }

        $material->image = $imgName;
        $material->write($material);

        return $this->redirect(['materials/index']);
    }

    public function actionDelete($id)
    {
        $material = Materials::findOne($id);

        if (!empty($material->image)) {
            $this->removeImg(\Yii::$app->basePath . '/web/uploads/' . $material->image);
            $this->removeImg(\Yii::$app->basePath . '/web/uploads/thumb/' . $material->image);
        }

        $material->delete();

        return $this->redirect(['index']);
    }

    private function removeImg(string $imgLink): void
    {
        if (file_exists($imgLink)) {
            unlink($imgLink);
        }
    }
}
