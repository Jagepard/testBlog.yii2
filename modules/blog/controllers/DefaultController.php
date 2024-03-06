<?php

namespace app\modules\blog\controllers;

use yii\data\Pagination;
use app\modules\auth\models\User;
use app\modules\blog\models\Materials;
use app\modules\blog\services\SlugService;
use yii\web\NotFoundHttpException;

class DefaultController extends BlogController
{
    public function actionIndex()
    {
        $query      = Materials::find()->where(['status' => 1]);
        $pages      = new Pagination([
            'pageSize'       => 20,
            'totalCount'     => $query->count(),
            'pageSizeParam'  => false,
        ]);

        $materials = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('id')
            ->all();

        return $this->render('index', [
            'title'     => ': Блог',
            'materials' => $materials,
            'pages'     => $pages
        ]);
    }

    public function actionItem($slug)
    {
        $id       = (new SlugService)->getIdFromSlug($slug);
        $material = Materials::find()->where(['id' => $id])->one();

        if (!$material) {
            throw new NotFoundHttpException("Material: $slug does'nt exists");
        }

        return $this->render('item', [
            'title'    => ': ' . $material['title'],
            'material' => $material,
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
