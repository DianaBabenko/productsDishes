<?php


namespace App\Repositories;


use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductRepository
{
    /**
     * @param int $id
     * @return Product|null|object
     */
    public function find(int $id): ?Product
    {
        return Product::query()->find($id);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Product::all();
    }

    /**
     * @param array $ids
     * @return bool
     */
    public function setStatusActive(array $ids): bool
    {
        Product::query()->select()->whereIn('id', $ids)->update(['status' => Product::STATUS_ACTIVE]);
        Product::query()->select()->where('status', '!=', Product::STATUS_FORBIDDEN)->whereNotIn('id', $ids)->update(['status' => Product::STATUS_AVAILABLE]);

        return true;
    }

    /**
     * @param int $status
     * @return array
     */
    public function getByStatus(int $status): array
    {
        $result = Product::query()
            ->select()
            ->where('status', '=', $status)
            ->getModels()
        ;

        return $result ?? [];

    }

    /**
     * @param int $id
     * @param Request $request
     * @return bool
     */
    public function update(Request $request, int $id): bool
    {
        $product = $this->find($id);


        if (!empty($product)) {
            $status = !empty($request->get('status')) ? $request->get('status') : $product->status;
            $expirationDate = !empty($request->post('expirationDate')) ? $request->post('expirationDate') : $product->expirationDate;
            //var_dump($status, $expirationDate);
            Product::query()->where('id', '=', $id)->update(['status' => $status, 'expirationDate' => $expirationDate]);
            return true;
        }


    }
}
