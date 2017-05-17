<?php
namespace app\models;

use \yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public  static  function tableName()
    {
        return 'product';
    }
    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public static function getHitsProduct()
    {
        return Product::find()->where(['hit' => '1'])->limit(6)->all();
    }
    public static function getProductsByCategory($id)
    {
        return Product::find()->where(['category_id' => $id]);
    }
}