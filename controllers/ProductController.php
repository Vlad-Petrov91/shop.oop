<?php

namespace app\controllers;

use app\controllers\Controller;
use app\models\Product;

class ProductController extends Controller
{

    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        $page = $_GET['page'] ?? 0;

        // $catalog = Product::getAll();
        $catalog = Product::getLimit(($page + 1) * 2);
        // $catalog = (new Product())->getAll();
        echo $this->render('product/catalog', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }
    public function actionCard()
    {
        $id = $_GET['id'];
        //$params['product'] = (new Product())->getOne($id);
        // var_dump(Product::getOneObj($id));
        // echo PHP_EOL;
        // var_dump(Product::getOne($id));
        // die();
        $params['product'] = Product::getOne($id);
        echo $this->render('product/card', $params);
    }
}
