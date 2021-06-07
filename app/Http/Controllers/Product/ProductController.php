<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Repositories\UserProductRepository;
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
     * @var UserProductRepository
     */
    private $userProduct;

    /**
     * ProductController constructor.
     * @param ProductRepository $products
     * @param UserProductRepository $userProduct
     */
    public function __construct(
        ProductRepository $products,
        UserProductRepository $userProduct
    )
    {
        $this->products = $products;
        $this->userProduct = $userProduct;
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request): RedirectResponse
    {
        $productIds = $request->post('product');

        $this->userProduct->checkIfExist($productIds, $request->user()->id);
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
        $data = $request->input();
        $result = $this->products->update($data, $product->id);

        return $result === true ? redirect()->route('products.categories.index') : redirect()->back()->withInput();
    }
}


