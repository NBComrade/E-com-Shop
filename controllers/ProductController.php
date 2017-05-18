<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use app\models\ProductComments;
use Yii;
use yii\data\Pagination;
use yii\web\HttpException;

class ProductController extends AppController
{
    public function actionIndex()
    {
        $query = Product::find()->where('id > 0');
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index', compact('products', 'pages'));
    }
    public function actionView()
    {
        $comment = new ProductComments();
        $id = Yii::$app->request->get('id');
        $comments = $comment->getProductCommetns($id);
        //var_dump($comments);die;
        $product = Product::findOne($id);
        $hits = Product::getHitsProduct();
        if(Yii::$app->request->isPost && $comment->load(Yii::$app->request->post())){
            $comment->product_id = $id;
            $comment->save();
            Yii::$app->session->setFlash('success','Thank you for your comment!');
        }
        if(empty($product )){
            throw new HttpException(404, "Do not correct query!");
        }
        return $this->render('view', compact('product', 'hits', 'comments', 'comment'));

    }
}