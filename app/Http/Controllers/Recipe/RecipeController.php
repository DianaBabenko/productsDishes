<?php

namespace App\Http\Controllers\Recipe;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Recipe;
use App\Models\RecipeSubcategory;
use App\Repositories\ProductRepository;
use App\Repositories\RecipeRepository;
use App\Repositories\UserProductRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
     * @var UserProductRepository
     */
    private $userProducts;

    /**
     * RecipeController constructor.
     * @param RecipeRepository $recipes
     * @param ProductRepository $products
     * @param UserProductRepository $userProducts
     */
    public function __construct(
        RecipeRepository $recipes,
        ProductRepository $products,
        UserProductRepository $userProducts
    )
    {
        $this->recipes = $recipes;
        $this->products = $products;
        $this->userProducts = $userProducts;
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
     * @param Request $request
     * @return View
     */
    public function generateDishes(Request $request): View
    {
        $paginateRecipes = $this->recipes->generateDishes();

        return view('recipes.generate', [
            'recipes' => $paginateRecipes,
        ]);

    }
}
