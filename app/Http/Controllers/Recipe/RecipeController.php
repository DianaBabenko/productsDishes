<?php

namespace App\Http\Controllers\Recipe;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\RecipeRepository;
use App\Repositories\RecipeSubcategoryRepository;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RecipeController extends Controller
{
    /** @var RecipeRepository */
    private $recipes;

    /** @var ProductRepository */
    private $products;

    /** @var RecipeSubcategoryRepository */
    private $recipeSubcategories;

    /**
     * RecipeController constructor.
     * @param RecipeRepository $recipes
     * @param ProductRepository $products
     * @param RecipeSubcategoryRepository $recipeSubcategories
     */
    public function __construct(
        RecipeRepository $recipes,
        ProductRepository $products,
        RecipeSubcategoryRepository $recipeSubcategories
    )
    {
        $this->recipes = $recipes;
        $this->products = $products;
        $this->recipeSubcategories = $recipeSubcategories;
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
     */
    public function index(int $id)
    {
        $paginateRecipes = $this->recipes->all();
        $subcategory = $this->recipeSubcategories->find($id);

        if ($subcategory === null) {
            throw new NotFoundHttpException();
        }

        return view('recipes.subcategory.index', [
            'recipes' => $paginateRecipes,
            'subcategory' => $subcategory
        ]);
    }

    /**
     * @param int $id
     * @param int $recipe_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
     */
    public function show(int $id, int $recipe_id)
    {
        $recipe = $this->recipes->find($recipe_id);

        if ($recipe === null) {
            throw new NotFoundHttpException();
        }

        return view('recipes.subcategory.show', [
            'recipe' => $recipe,
            'id' => $id
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
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
