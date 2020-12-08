<?php


namespace App\Http\Controllers\Product;


use App\Http\Controllers\Controller;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends Controller
{
    /** @var ProductRepository  */
    private $products;
    /** @var ProductCategoryRepository  */
    private $productsCategories;

    public function __construct(ProductRepository $products, ProductCategoryRepository $productsCategories)
    {
        $this->products = $products;
        $this->productsCategories = $productsCategories;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function save(Request $request)
    {
        $productIds = $request->post('product');

        $result = $this->products->setStatusActive($productIds);

        if ($result === true) {
            $categories = $this->productsCategories->all();
            $products = $this->products->all();

            return view('products.categories.index', [
                'categories' => $categories,
                'products' => $products
            ]);
        }
    }

    public function edit(int $id)
    {
        $product = $this->products->find($id);

        if ($product === null) {
            throw new NotFoundHttpException();
        }

        return view('products.edit', [
            'product' => $product,
        ]);

    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id ): RedirectResponse
    {
        $data = $request;
        $product = $this->products->find($id);

        if ($product === null) {
            throw new NotFoundHttpException();
        }


        if ($this->products->update($data, $id)) {
            $categories = $this->productsCategories->all();
            $products = $this->products->all();

            return redirect()->route('products.categories.index', [
                'categories' => $categories,
                'products' => $products
            ]);
        }

    }

//    /**
//     * @param Request $request
//     * @param int $id
//     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
//     */
//    public function update(Request $request, int $id)
//    {
//        $productIds = $request->post('status');
//var_dump($productIds, $id);
////        $result = $this->products->setStatusActive($productIds);
////
////        if ($result === true) {
////            $categories = $this->productsCategories->all();
////            $products = $this->products->all();
////
////            return view('products.categories.index', [
////                'categories' => $categories,
////                'products' => $products
////            ]);
////        }
//    }
}
