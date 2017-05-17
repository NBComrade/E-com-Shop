<?php
namespace app\controllers;

use app\models\Article;
use app\models\ArticleComments;
use yii\data\Pagination;
use Yii;

class ArticleController extends AppController
{
    public function actionIndex()
    {
        $query = Article::find();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index', compact('posts', 'pages'));
    }
    public function actionView()
    {
        $comment = new ArticleComments();
        $id = Yii::$app->request->get('id');
        $comments = $comment->getArticleCommetns($id);
        if(Yii::$app->request->isPost){
            $comment->load(Yii::$app->request->post());
            $comment->article_id = $id;
            $comment->save();
        }
        $post = Article::findOne($id);
        return $this->render('view', compact('post', 'comment', 'comments'));
    }
}