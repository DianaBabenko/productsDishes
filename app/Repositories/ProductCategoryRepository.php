<?php

namespace App\Repositories;

use App\Models\ProductCategory;
use Illuminate\Support\Collection;

class ProductCategoryRepository
{
    /**
     * @param int $id
     * @return ProductCategory|null|object
     */
    public function find(int $id): ?ProductCategory
    {
        return ProductCategory::query()->find($id);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return ProductCategory::all();
    }
}
