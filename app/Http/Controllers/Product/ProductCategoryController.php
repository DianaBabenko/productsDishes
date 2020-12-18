<?php


namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;


use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductCategoryController extends Controller
{

    /** @var ProductCategoryRepository */
    private $productsCategories;
    /** @var ProductRepository  */
    private $products;

    /**
     * ProductCategoryController constructor.
     * @param ProductCategoryRepository $productsCategories
     * @param ProductRepository $products
     */
    public function __construct(ProductCategoryRepository $productsCategories, ProductRepository $products)
    {
        $this->productsCategories = $productsCategories;
        $this->products = $products;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = $this->productsCategories->all();
        $products = $this->products->all();

        return view('products.categories.index', [
            'categories' => $categories,
            'products' => $products
        ]);

    }
}
