<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $record_id
 * @property string $title
 * @property string $description
 * @property string $file_name
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'record_id'], 'integer'],
            [['file_name'], 'string'],
            [['title'], 'string', 'max' => 128],
            [['description'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'record_id' => Yii::t('app', 'Record ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'file_name' => Yii::t('app', 'File Name'),
        ];
    }
}
