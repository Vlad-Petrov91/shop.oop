<?php

namespace app\controllers;

use app\controllers\Controller;
use app\models\Cart;

class CartController extends Controller
{

    public function actionIndex()
    {
        $session = session_id();
        $cart = Cart::getCart($session);
        echo $this->render('cart', [
            'cart' => $cart
        ]);
    }

    public function actionAdd()
    {

        $data = $this->request->getParams();
        $session = session_id();
        $id = $data['id'];
        $price = (int)$data['price'];
        $count = (int)$data['count'];

        $cart = new Cart($id, $session, $count, $price);
        $cart->save();

        $responce = [
            'status' => 'ok',
            'countOfInCart' => Cart::getCountOfInCart($session)
        ];
        echo json_encode($responce, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }

    public function actionDelete()
    {

        $data = $this->request->getParams();
        $session = session_id();
        $id = $data['cartId'];

        $cart = Cart::getWhere('id', $id);
        $cart->delete();

        $responce = [
            'status' => 'ok',
            'countOfInCart' => Cart::getCountOfInCart($session)
        ];
        echo json_encode($responce, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }
}
