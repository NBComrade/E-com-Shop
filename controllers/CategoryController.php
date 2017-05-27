<?php
namespace app\controllers;


use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;
use yii\helpers\Html;
use yii\web\HttpException;

class CategoryController extends AppController
{
    public function actionIndex()
    {
        $hits = Product::getHitsProduct();
        return $this->render('index', compact('hits', 'lastsArticles'));
    }

    public function actionView()
    {
        $id = Yii::$app->request->get('id');
        $category = Category::findOne($id);
        if (empty($category)) {
            throw new HttpException(404, "Do not correct query!");
        }
        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('view', compact('products', 'category', 'pages'));
    }

    public function actionSearch()
    {
        $q = Html::encode(Yii::$app->request->get('q'));
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'q', 'pages'));
    }
}