<?php

namespace app\controllers;

use app\controllers\Controller;
use app\engine\App;
use app\engine\Session;
use app\models\entities\Cart;
use app\models\repositories\CartRepository;

class CartController extends Controller
{

    public function actionIndex()
    {
        $session = App::call()->session->getId();
        $cart = App::call()->cartRepository->getCart($session);
        echo $this->render('cart', [
            'cart' => $cart
        ]);
    }

    public function actionAdd()
    {
        $data = App::call()->request->getParams();
        $sessionId = App::call()->session->getId();
        $id = $data['id'];
        $price = (int)$data['price'];
        $count = (int)$data['count'];
        $cartRepository = App::call()->cartRepository;

        $cart = new Cart($id, $sessionId, $count, $price);

        if (!$cart) {
            $responce = [
                'status' => 'error cart',
                'countOfInCart' => $cartRepository->getCountWhere('session', $sessionId),
            ];
        } else {
            $cartRepository->save($cart);
            $responce = [
                'status' => 'ok',
                'countOfInCart' => $cartRepository->getCountWhere('session', $sessionId),
            ];
        }
        echo json_encode($responce, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }

    public function actionDelete()
    {

        $data = App::call()->request->getParams();
        $sessionId = App::call()->session->getId();
        $id = $data['cartId'];
        $cartRepository = App::call()->cartRepository;
        $cart = $cartRepository->getWhere('id', $id);
        $cartRepository->delete($cart);

        $responce = [
            'status' => 'ok',
            'countOfInCart' => $cartRepository->getCountWhere('session', $sessionId),
        ];
        echo json_encode($responce, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }
}
