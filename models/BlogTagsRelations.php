<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_tags_relations".
 *
 * @property integer $id
 * @property integer $tag_id
 * @property integer $record_id
 */
class BlogTagsRelations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_tags_relations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_id', 'record_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tag_id' => Yii::t('app', 'Tag ID'),
            'record_id' => Yii::t('app', 'Record ID'),
        ];
    }
}
