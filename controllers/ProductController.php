<?php

namespace app\controllers;

use app\controllers\Controller;
use app\engine\App;
use app\models\Product;
use app\models\repositories\ProductRepository;

class ProductController extends Controller
{

    public function actionIndex()
    {

        $catalog = App::call()->productRepository;
        //  $catalog = $catalog->getAll();
        // $catalog = $catalog->
        $catalog = $catalog->getRandomItems(6);
        echo $this->render('index', $params = [
            'catalog' => $catalog,
        ]);
    }

    public function actionCatalog()
    {
        $page = $_GET['page'] ?? 1;

        $catalog = new ProductRepository();
        //  $catalog = $catalog->getAll();
        $countPages = ceil($catalog->getCountOfProducts() / 9);
        if ($page < 1)  $page = 1;
        if ($page > $countPages)  $page = $countPages;
        $catalog = $catalog->getLimit(9, ($page - 1) * 9);
        echo $this->render('product/catalog', [
            'catalog' => $catalog,
            'page' => $page,
            'countPages' => $countPages,
            'pageUrl' => "/product/catalog/?page=",
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
    public function actionCategory()
    {
        $category_id = $_GET['id'];
        $page = $_GET['page'] ?? 1;
        $product = App::call()->productRepository;
        $countPages = ceil($product->getCountOfProducts($category_id) / 9);
        if ($page < 1)  $page = 1;
        if ($page > $countPages)  $page = $countPages;
        $catalog = $product->getWhereLimit('category_id', $category_id, 9, ($page - 1) * 9);
        $categoryName = $product->getCategoryName($category_id);

        echo $this->render('product/catalog', [
            'catalog' => $catalog,
            'page' => $page,
            'countPages' => $countPages,
            'categoryName' => $categoryName,
            'pageUrl' => "/product/category/?id={$category_id}&page=",
        ]);
    }
}
