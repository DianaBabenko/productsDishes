<?php


namespace App\Repositories;

use App\Models\RecipeSubcategory;
use Illuminate\Support\Collection;

class RecipeSubcategoryRepository
{
    /**
     * @param int $id
     * @return RecipeSubcategory|null|object
     */
    public function find(int $id): ?RecipeSubcategory
    {
        return RecipeSubcategory::query()->find($id);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return RecipeSubcategory::all();
    }
}
