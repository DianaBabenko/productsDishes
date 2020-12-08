<?php


namespace App\Repositories;

use App\Models\RecipeCategory;
use Illuminate\Support\Collection;

class RecipeCategoryRepository
{
    /**
     * @param int $id
     * @return RecipeCategory|null|object
     */
    public function find(int $id): ?RecipeCategory
    {
        return RecipeCategory::query()->find($id);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return RecipeCategory::all();
    }
}
