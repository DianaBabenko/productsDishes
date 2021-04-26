<?php

namespace App\Http\Controllers\Recipe;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\RecipeSubcategory;
use App\Repositories\ProductRepository;
use App\Repositories\RecipeRepository;
use Illuminate\Contracts\View\View;

/**
 * Class RecipeController
 * @package App\Http\Controllers\Recipe
 */
class RecipeController extends Controller
{
    /**
     * @var RecipeRepository
     */
    private $recipes;

    /**
     * @var ProductRepository
     */
    private $products;

    /**
     * RecipeController constructor.
     * @param RecipeRepository $recipes
     * @param ProductRepository $products
     */
    public function __construct(
        RecipeRepository $recipes,
        ProductRepository $products
    )
    {
        $this->recipes = $recipes;
        $this->products = $products;
    }

    /**
     * @param RecipeSubcategory $recipeSubcategory
     * @return View
     */
    public function index(RecipeSubcategory $recipeSubcategory): View
    {
        $paginateRecipes = $this->recipes->all();

        return view('recipes.subcategory.index', [
            'recipes' => $paginateRecipes,
            'subcategory' => $recipeSubcategory
        ]);
    }

    /**
     * @param RecipeSubcategory $recipeSubcategory
     * @param Recipe $recipe
     * @return View
     */
    public function show(RecipeSubcategory $recipeSubcategory, Recipe $recipe): View
    {
        return view('recipes.subcategory.show', [
            'recipe' => $recipe,
            'id' => $recipeSubcategory->id
        ]);
    }

    /**
     * @return View
     */
    public function generateDishes(): View
    {
        $activeProducts = $this->products->getByStatus();

        $activeRecipes = $this->recipes->getByProductIds($activeProducts);

        return view('recipes.generate', [
            'recipes' => $activeRecipes
        ]);
    }
}
