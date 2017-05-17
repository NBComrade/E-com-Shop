<?php
/**
 * Created by PhpStorm.
 * User: Богдан
 * Date: 08.05.2017
 * Time: 18:31
 */

namespace app\controllers;
use app\models\Product;
use app\models\Cart;
use app\models\OrderItems;
use app\models\Order;
use Yii;
use yii\helpers\VarDumper;

class CartController extends AppController
{
    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $qty = (int) Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;
        $product = Product::findOne($id);
        if(empty($product)){
            return false;
        }else{
            $session = Yii::$app->session;
            $session->open();
            Cart::addToCart($product, $qty);
            $this->layout = false;
            return $this->render('view', compact('session'));
        }
    }
    public function actionClear(){
        $session = Yii::$app->session;
        $session->open();
        $id = Yii::$app->request->get('id');
        Cart::clearCart($id);
        $this->layout = false;
        return $this->render('view', compact('session'));
    }
    public function actionDelete(){
        $session = Yii::$app->session;
        $session->open();
        Cart::deleteBasket();
        $this->layout = false;
        return $this->render('view', compact('session'));
    }
    public function actionShow(){
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('view', compact('session'));
    }
    public function actionPlus(){
        $session = Yii::$app->session;
        $session->open();
        $id = Yii::$app->request->get('id');
        Cart::plusItem($id);
        $this->layout = false;
        return $this->render('view', compact('session'));
    }
    public function actionMinus(){
        $session = Yii::$app->session;
        $session->open();
        $id = Yii::$app->request->get('id');
        Cart::minusItem($id);
        $this->layout = false;
        return $this->render('view', compact('session'));
    }
    public function actionOrder(){
        $session = Yii::$app->session;
        $session->open();
        $order = new Order();
        if($order->load(Yii::$app->request->post())){
          $order->qty = $session['cart.qty'];
          $order->sum = $session['cart.sum'];
         // $order->status = 0;

          if($order->save()){
              $this->saveOrderItems($session['cart'],$order->id);
              Yii::$app->mailer->compose('layouts/order', compact('session'))
                  ->setFrom('test@gmail.com')
                  ->setTo($order->email)
                  ->setSubject('Order Form Eshopper')
                  ->send();

              Cart::deleteBasket();
              Yii::$app->session->setFlash('success', 'You order accepted. Thunk you!');
              return $this->render('order', compact('session', 'order'));
          }else{
              Yii::$app->session->setFlash('error', 'You have a mistake in your order!');
          }
        }
        return $this->render('order', compact('session', 'order'));
    }

    /**
     * @param $items
     * @param $orderId
     */
    protected function saveOrderItems($items, $orderId)
    {
        foreach($items as $id => $item){
            $orderItems = new OrderItems();
            $orderItems->order_id = $orderId;
            $orderItems->product_id = $id;
            $orderItems->name = $item['name'];
            $orderItems->qty_item = $item['qty'];
            $orderItems->price = $item['price'];
            $orderItems->sum_item = $item['price'] * $item['qty'];
            $orderItems->save();
        }
    }
}