<?php

namespace app\modules\blog\models;

use Yii;
use \yii\db\ActiveRecord;
/**
 * This is the model class for table "articles".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $author_id
 * @property string $created_at
 */
class Article extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'author_id', 'created_at'], 'required'],
            [['content'], 'string'],
            [['author_id'], 'integer'],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
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
            'content' => 'Content',
            'author_id' => 'Author ID',
            'created_at' => 'Created At',
        ];
    }
}
