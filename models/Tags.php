<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property string $id
 * @property string $title
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['title'], 'string', 'max' => 254],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }
    public function getProducts(){
        return $this->hasMany(Products::className(), ["id"=>"product_id"])
                ->viaTable("product_tag",["tag_id"=>"id"]);
    }
}
