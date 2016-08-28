<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property integer $status
 * @property string $creata_at
 * @property integer $hot
 * @property string $category
 * @property double $price
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'creata_at', 'price'], 'required'],
            [['description'], 'string'],
            [['status', 'hot', 'category'], 'integer'],
            [['creata_at'], 'safe'],
            [['price'], 'number'],
            [['title'], 'string', 'max' => 254],
            [['image'], 'file', 'skipOnEmpty'=>false],
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
            'image' => 'Image',
            'status' => 'Status',
            'creata_at' => 'Creata At',
            'hot' => 'Hot',
            'category' => 'Category',
            'price' => 'Price',
        ];
    }
    public function upload()
    {
        if ($this->validate()){
            $this->image->saveAs('upload/'. $this->image->baseName . '.'. $this->image->extension);
           return true;
         } else {
        return false;
        }
    }
    public function thumb()
    {   
        $width = 500;
        $height = 300;
        if ($this->image ==''){
            return "/img/no_photo.png";
        }
        $thumb = "upload/thumbs/".$this->image;
        $save = Yii::getAlias('@webroot/thumbs/'.$this->image);
        
        $file = Yii::getAlias('@webroot/upload/'.$this->image);
        if (file_exists($save)){
            return $thumb;
        }
        $image = Yii::$app->image->load($file);
         
        $image->resize($width, $height)->save($save);
        return $thumb;
    }
    public function getCategory(){
        return $this->hasOne(Categories::className(), ["id" => "category"]);
    }
    public function getTags(){

        return $this->hasMany(Tags::className(),["id"=>"tag_id"])
                ->viaTable("tag",["tag_id"=>"id"]);
    }
}
