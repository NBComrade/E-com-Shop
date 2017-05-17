<?php

namespace app\models;
use yii\base\Model;

use Yii;

class Cart extends Model
{
    public  static function addToCart($product, $qty = 1)
    {
        if(isset($_SESSION['cart'][$product->id])){
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$product->id] = [
                'qty' => $qty,
                'name' => $product->name,
                'price' => $product->price,
                'img' => $product->img
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] +
            $qty :$qty ;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] +
            $qty * $product->price : $qty * $product->price;
    }
    public static function clearCart($id)
    {
         $id = (string)$id;
         $price = $_SESSION['cart'][$id]['price'];
         $qty = $_SESSION['cart'][$id]['qty'];
         unset($_SESSION['cart'][$id]);
         $_SESSION['cart.qty'] = $_SESSION['cart.qty'] - $qty;
         $_SESSION['cart.sum'] = $_SESSION['cart.sum'] - $price;
    }
    public static function deleteBasket()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->destroy();
    }
    public static function plusItem($id)
    {
        $id = (string)$id;
        $_SESSION['cart'][$id]['qty'] = $_SESSION['cart'][$id]['qty'] + 1;
        $price = $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] = $_SESSION['cart.qty'] + 1;
        $_SESSION['cart.sum'] = $_SESSION['cart.sum'] + $price;
    }
    public static function minusItem($id)
    {
        $id = (string)$id;
        $_SESSION['cart'][$id]['qty'] = $_SESSION['cart'][$id]['qty'] - 1;
        $price = $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] = $_SESSION['cart.qty'] - 1;
        $_SESSION['cart.sum'] = $_SESSION['cart.sum'] - $price;
    }
}