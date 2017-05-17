<?php


namespace app\models;



use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use Yii;
use yii\db\Expression;

class ArticleComments extends ActiveRecord
{
    public static function tableName()
    {
        return 'article_comments';
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
    public function rules()
    {
        return [
            [['content'], 'required']
        ];
    }
    public function beforeSave($insert)
    {
        $this->user_id = Yii::$app->user->id;
        return parent::beforeSave($insert);
    }
    public function getArticleCommetns($id)
    {
        return ArticleComments::findAll(['article_id' => $id, 'status'=> '1']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id'=>'user_id']);
    }
}