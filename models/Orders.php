<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property string $id
 * @property string $address
 * @property string $name
 * @property string $email
 * @property string $products
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address', 'products'], 'string'],
            [['name', 'email'], 'string', 'max' => 254],
            [['total']. 'requied']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'name' => 'Name',
            'email' => 'Email',
            'products' => 'Products',
        ];
    }
}
