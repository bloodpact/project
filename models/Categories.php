<?php
namespace app\models;

use Yii;
class Categories extends \yii\db\ActiveRecord {
 public static function tableName()
    {
        return 'Categories';
    }
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['description', ], 'string'],
            [['title'], 'string', 'max' => 254]
            
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
            'description' => 'Description',
        ];
    }
	public function getProducts()
	{
		return $this->hasMany(Products::className(), ["category"=> "id"]);
	}
}