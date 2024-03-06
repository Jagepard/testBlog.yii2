<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveQuery;
use yii\data\Pagination;
use app\modules\admin\services\SlugService;

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
            [['title'], 'required'],
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

    public function write(Materials $material): void
    {      
        if ($this->validate()) {
            $material->slug  = (new SlugService)->translit($material->title);
            $material->save();
        } else {
            dd($this->errors);
        }
    }

    public static function paginate(ActiveQuery $query, int $pageSize = 15): array
    {
        $pages = new Pagination([
            'pageSize'       => $pageSize,
            'totalCount'     => $query->count(),
            'pageSizeParam'  => false,
        ]);

        $materials = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('id DESC')
            ->all();

        return [
            'materials' => $materials,
            'pages'     => $pages
        ];
    }
}
