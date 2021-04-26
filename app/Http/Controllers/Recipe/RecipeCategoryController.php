<?php

namespace App\Http\Controllers\Recipe;

use App\Http\Controllers\Controller;
use App\Repositories\RecipeCategoryRepository;
use App\Repositories\RecipeSubcategoryRepository;
use Illuminate\Contracts\View\View;

/**
 * Class RecipeCategoryController
 * @package App\Http\Controllers\Recipe
 */
class RecipeCategoryController extends Controller
{
    /**
     * @var RecipeCategoryRepository
     */
    private $recipesCategories;

    /**
     * @var RecipeSubcategoryRepository
     */
    private $recipesSubcategories;

    /**
     * RecipeCategoryController constructor.
     * @param RecipeCategoryRepository $recipesCategories
     * @param RecipeSubcategoryRepository $recipesSubcategories
     */
    public function __construct(
        RecipeCategoryRepository $recipesCategories,
        RecipeSubcategoryRepository $recipesSubcategories
    )
    {
        $this->recipesCategories = $recipesCategories;
        $this->recipesSubcategories = $recipesSubcategories;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $categories = $this->recipesCategories->all();
        $subcategories = $this->recipesSubcategories->all();

        return view('recipes.index', [
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }
}
