<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveQuery;
use yii\data\Pagination;
use yii\base\DynamicModel;
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

    public function write(Materials $material): void
    {      
        $request   = \Yii::$app->request;
        $post      = $request->post();
        $validated = DynamicModel::validateData(
            [
                'title' => $post['title'], 
                'text'  => $post['text']
            ], 
            [
                [['title', 'text'], 'trim'],
                ['title', 'required'],
                ['title', 'string', 'max' => 255],
                ['text', 'string'],
            ]
        );
    
        if ($validated->hasErrors()) {
            dd('validation fails');
        } else {
            $material->title = $validated['title'];
            $material->slug  = (new SlugService)->translit($validated['title']);
            $material->text  = $validated['text'];

            $material->save();
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
