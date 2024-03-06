<?php

namespace app\modules\admin\controllers;

use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\modules\admin\models\Materials;
use app\modules\admin\models\UploadImage;
use yii\web\NotFoundHttpException;

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
        $this->error404($material, $id);

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
        $this->error404($material, $id);
        $material->setAttributes(\Yii::$app->request->post());
        $imgName  = ($upload->image) ? time() . '_' . $upload->image->name : $material->image;

        if ($upload->image) {
            $upload->upload($imgName);
            $this->delImages($material->image);
        }

        $material->image = $imgName;
        $material->write($material);

        return $this->redirect(['materials/index']);
    }

    public function actionDelete($id)
    {
        $material = Materials::findOne($id);
        $this->error404($material, $id);
        $this->delImages($material->image);
        $material->delete();

        return $this->redirect(['materials/index']);
    }

    public function actionDelimg($id)
    {
        $material = Materials::findOne($id);
        $this->error404($material, $id);
        $this->delImages($material->image);
        $material->image = '';
        $material->write($material);

        return $this->redirect(['materials/index']);
    }

    private function removeImg(string $imgLink): void
    {
        if (file_exists($imgLink)) {
            unlink($imgLink);
        }
    }

    private function delImages(string $imgName): void
    {
        if(!empty($imgName)) {
            $this->removeImg(\Yii::$app->basePath . '/web/uploads/' . $imgName);
            $this->removeImg(\Yii::$app->basePath . '/web/uploads/thumb/' . $imgName);
        }
    }

    private function error404($material, $id)
    {
        if (!$material) {
            throw new NotFoundHttpException("Material: $id does'nt exists");
        }
    }
}
