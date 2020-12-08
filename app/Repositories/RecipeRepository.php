<?php


namespace App\Repositories;

use App\Models\Recipe;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class RecipeRepository
{

    /**
     * @param int $id
     * @return Recipe|null|object
     */
    public function find(int $id): ?Recipe
    {
        return Recipe::query()->find($id);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Recipe::all();
    }

    public function getByProductIds(array $activeProducts): array
    {
        $arr = array();
        foreach ($activeProducts as $product) {
            foreach ($product->recipes as $key => $recipe) {
                if (array_key_exists((string)$recipe->id, $arr)) {
                    $arr[(string)$recipe->id]++;
                } else {
                    $arr[(string)$recipe->id] = 1;
                }
            }
        }

        return $this->getIngredientsNumbers($arr);
    }

    /**
     * @param array $arr
     * @return array
     */
    public function getIngredientsNumbers(array $arr): array
    {
        $result = array();
        foreach ($arr as $key => $value) {
            /** @var Recipe $recipe */
            $recipe = Recipe::query()->find($key);

            if (!$recipe) {
                return [];
            }

            $result[(string)$key] = $recipe->ingredientsNumber / $value;
        }
        $collectResult = collect($result)->sort()->toArray();

        return $this->getGenerateRecipes($collectResult);
    }

    public function getGenerateRecipes(array $collectResult): array
    {
        $activeRecipes = array();

        foreach ($collectResult as $key => $value) {
            $activeRecipe = Recipe::query()->find($key);

            if (!$activeRecipe) {
                return [];
            }

            $activeRecipes[] = $activeRecipe;
        }

//        foreach ($activeRecipes as $activeKey => $activeValue) {
//            var_dump($activeValue->id);
//        }
        return $activeRecipes;
    }
    /**
     * @param int|null $count
     * @return LengthAwarePaginator
     */
    public function getWithPaginate(int $count = null): LengthAwarePaginator
    {
        Recipe::query()
            ->paginate($count)
        ;
    }
}
