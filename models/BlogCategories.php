<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_categories".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property integer $user_id
 */
class BlogCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'user_id'], 'integer'],
            [['title'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'title' => Yii::t('app', 'Title'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * Generate categories tree
     * @param int $parent parend ID, default 0
     * @param int $user_id user ID, default 0
     * @return array recursive array tree
     */
    public static function getCategoriesTree($parent = 0, $user_id = 0){
        $out = [];
        $categories = self::findAll(['parent_id' => $parent, 'user_id' => $user_id]);
        foreach($categories as $category){
            $count = BlogRecords::find()->where(['category_id' => $category->id, 'author_id' => $category->user_id])->count();
            $out[$category->id] = ['title' => $category->title, 'user_id' => $category->user_id, 'records_count' => (int)$count];
            $childs = self::getCategoriesTree($category->id, $user_id);
            if(!empty($childs)){
                $out[$category->id]['childs'] = $childs;
            }
        }
        return $out;
    }

}
