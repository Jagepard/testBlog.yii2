<?php

namespace app\modules\blog\models;

use Yii;

/**
 * This is the model class for table "materials".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $text
 * @property string|null $image
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Materials extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materials';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'required'],
            [['text'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'slug', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'text' => 'Text',
            'image' => 'Image',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
