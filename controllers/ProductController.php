<?php

namespace app\controllers;

use app\controllers\Controller;
use app\models\Product;
use app\models\repositories\ProductRepository;

class ProductController extends Controller
{

    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        $page = $_GET['page'] ?? 0;

        $catalog = new ProductRepository();
        //  $catalog = $catalog->getAll();
        $catalog = $catalog->getLimit(($page + 1) * 2);
        echo $this->render('product/catalog', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }
    public function actionCard()
    {
        $id = $_GET['id'];
        $product = new ProductRepository();
        //$params['product'] = (new Product())->getOne($id);
        // var_dump(Product::getOneObj($id));
        // echo PHP_EOL;
        // var_dump(Product::getOne($id));
        // die();
        $params['product'] = $product->getOne($id);
        echo $this->render('product/card', $params);
    }
}
