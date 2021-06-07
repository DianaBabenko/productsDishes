<?php

namespace App\Repositories;

use App\Models\UserProduct;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class UserProductRepository
 * @package App\Repositories
 */
class UserProductRepository
{
    /**
     * @param array $ids
     * @param int $user_id
     */
    public function checkIfExist(array $ids, int $user_id): void
    {
        foreach ($ids as $id) {
            $userProduct = UserProduct::query()
                ->where([
                    ['user_id', '=', $user_id],
                    ['product_id', '=', $id]
                ])->exists();

            if ($userProduct === false) {
                $this->create(['product_id' => $id, 'user_id' => $user_id]);
            }
        }
    }

    /**
     * @param array $data
     * @return UserProduct|object|null
     */
    public function create(array $data)
    {
        return UserProduct::query()->create($data);
    }

    /**
     * @param int $user_id
     * @return Collection
     */
    public function getAllProductsByUserID(int $user_id): Collection
    {
        return UserProduct::query()->where('user_id', '=', $user_id)->get();
    }
}
