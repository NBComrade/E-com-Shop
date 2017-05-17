<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "product_comments".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $user_id
 * @property integer $content
 * @property integer $created_at
 * @property string $status
 */
class ProductComments extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', ], 'required']
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'user_id' => 'User ID',
            'content' => 'Content',
            'created_at' => 'Created At',
            'status' => 'Status',
        ];
    }
    public function beforeSave($insert)
    {
        $this->user_id = Yii::$app->user->id;
        return parent::beforeSave($insert);
    }
    public function getProductCommetns($id)
    {
        return ProductComments::findAll(['product_id' => $id, 'status'=> '1']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id'=>'user_id']);
    }
}
