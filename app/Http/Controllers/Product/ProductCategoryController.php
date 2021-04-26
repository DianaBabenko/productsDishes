<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\View\View;

/**
 * Class ProductCategoryController
 * @package App\Http\Controllers\Product
 */
class ProductCategoryController extends Controller
{
    /**
     * @var ProductCategoryRepository
     */
    private $productsCategories;

    /**
     * @var ProductRepository
     */
    private $products;

    /**
     * ProductCategoryController constructor.
     * @param ProductCategoryRepository $productsCategories
     * @param ProductRepository $products
     */
    public function __construct(
        ProductCategoryRepository $productsCategories,
        ProductRepository $products)
    {
        $this->productsCategories = $productsCategories;
        $this->products = $products;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $categories = $this->productsCategories->all();
        $products = $this->products->all();

        return view('products.categories.index', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
