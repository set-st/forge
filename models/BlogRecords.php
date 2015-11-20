<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_records".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $author_id
 * @property string $title
 * @property string $intro
 * @property string $article
 * @property string $date
 */
class BlogRecords extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_records';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'author_id'], 'integer'],
            [['article'], 'string'],
            [['date'], 'safe'],
            [['title'], 'string', 'max' => 128],
            [['intro'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'author_id' => Yii::t('app', 'Author ID'),
            'title' => Yii::t('app', 'Title'),
            'intro' => Yii::t('app', 'Intro'),
            'article' => Yii::t('app', 'Article'),
            'date' => Yii::t('app', 'Date'),
        ];
    }
}
