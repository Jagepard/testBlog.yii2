<?php

namespace app\modules\admin\models;

use Imagine\Image\ImageInterface;
use yii\base\Model;
use yii\imagine\Image;
use yii\web\UploadedFile;

class UploadImage extends Model
{
    public $image;

    public function rules()
    {
        return[
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg, gif'],
        ];
    }

    public function upload(string $imgName, int $quality = 80)
    {
        if($this->validate()) {
            $file      = \Yii::$app->basePath . '/web/uploads/' . $imgName;
            $thumbFile = \Yii::$app->basePath . '/web/uploads/thumb/' . $imgName;

            $this->image->saveAs($file);
            Image::thumbnail($file, 100, 100, ImageInterface::THUMBNAIL_INSET)->save($thumbFile, ['quality' => $quality]);
        }else{
            return false;
        }
    }
}
