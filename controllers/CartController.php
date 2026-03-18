<?php

namespace app\controllers;

use app\controllers\Controller;
use app\engine\Session;
use app\models\entities\Cart;
use app\models\repositories\CartRepository;

class CartController extends Controller
{

    public function actionIndex()
    {
        $session = session_id();
        $cart = (new CartRepository())->getCart($session);
        echo $this->render('cart', [
            'cart' => $cart
        ]);
    }

    public function actionAdd()
    {
        $data = $this->request->getParams();
        $session = new Session();
        $id = $data['id'];
        $price = (int)$data['price'];
        $count = (int)$data['count'];
        $cartRepository = new CartRepository();


        $cart = new Cart($id, $session->getId(), $count, $price);
        if (!$cart) {
            $responce = [
                'status' => 'error cart',
                'countOfInCart' => $cartRepository->getCountWhere('session', $session->getId()),
            ];
        } else {
            $cartRepository->save($cart);
            $responce = [
                'status' => 'ok',
                'countOfInCart' => $cartRepository->getCountWhere('session', $session->getId()),
            ];
        }
        echo json_encode($responce, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }

    public function actionDelete()
    {

        $data = $this->request->getParams();
        $session = new Session();
        $id = $data['cartId'];
        $cartRepository = new CartRepository();
        $cart = $cartRepository->getWhere('id', $id);
        $cartRepository->delete($cart);

        $responce = [
            'status' => 'ok',
            'countOfInCart' => $cartRepository->getCountWhere('session', $session->getId()),
        ];
        echo json_encode($responce, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }
}
