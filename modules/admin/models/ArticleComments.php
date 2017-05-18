<?php

namespace app\modules\admin\models;

use app\models\User;
use Yii;

/**
 * This is the model class for table "article_comments".
 *
 * @property integer $id
 * @property integer $article_id
 * @property integer $user_id
 * @property string $content
 * @property string $created_at
 * @property string $status
 */
class ArticleComments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'user_id', 'content'], 'required'],
            [['article_id', 'user_id'], 'integer'],
            [['content', 'status'], 'string'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'user_id' => 'User ID',
            'content' => 'Content',
            'created_at' => 'Created At',
            'status' => 'Status',
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }
}
