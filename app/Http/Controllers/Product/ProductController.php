<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers\Product
 */
class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $products;

    /**
     * ProductController constructor.
     * @param ProductRepository $products
     */
    public function __construct(ProductRepository $products)
    {
        $this->products = $products;
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request): RedirectResponse
    {
        $productIds = $request->post('product');
        $result = $this->products->setStatusActive($productIds);

        return $result === true ? redirect()->route('products.categories.index') : redirect()->back()->withInput();
    }

    /**
     * @param Product $product
     * @return View
     */
    public function edit(Product $product): View
    {
        return view('products.edit', [
            'product' => $product,
        ]);

    }

    /**
     * @param Request $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $data = $request;
        $result = $this->products->update($data, $product->id);

        return $result === true ? redirect()->route('products.categories.index') : redirect()->back()->withInput();
    }
}


