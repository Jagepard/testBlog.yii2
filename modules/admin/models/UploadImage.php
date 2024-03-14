<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\imagine\Image;
use yii\web\UploadedFile;
use Imagine\Image\ImageInterface;

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

            $filePath  = \Yii::$app->basePath . '/web/uploads/';
            $thumbPath = \Yii::$app->basePath . '/web/uploads/thumb/';
            $file      = $filePath . $imgName;
            $thumbFile = $thumbPath . $imgName;

            $this->checkPath($filePath);
            $this->checkPath($thumbPath);

            $this->image->saveAs($file);
            Image::thumbnail($file, 100, 100, ImageInterface::THUMBNAIL_INSET)->save($thumbFile, ['quality' => $quality]);
        }else{
            return false;
        }
    }

    private function checkPath(string $path): void
    {
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
    }
}
