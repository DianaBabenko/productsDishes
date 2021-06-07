<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Product\ProductCategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Recipe\RecipeCategoryController;
use App\Http\Controllers\Recipe\RecipeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('recipes', [RecipeCategoryController::class, 'index'])->name('recipes.index');
Route::get('recipes/subcategory/{recipeSubcategory}', [RecipeController::class, 'index'])->name('recipes.subcategory.index');
Route::get('recipes/subcategory/{recipeSubcategory}/show/{recipe}', [RecipeController::class, 'show'])->name('recipes.subcategory.show');

Route::middleware(['auth'])->group(static function () {
    Route::prefix('account')->name('account.')->group(static function () {
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::patch('/{user}/update', [UserController::class, 'update'])->name('update');
        Route::get('/', [UserController::class, 'index'])->name('index');
    });

    Route::get('products/categories', [ProductCategoryController::class, 'index'])->name('products.categories.index');
    Route::post('products/categories', [ProductController::class, 'save'])->name('products.categories.save');

    Route::get('products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('products/edit/{product}', [ProductController::class, 'update'])->name('products.update');

    Route::get('recipes/generate', [RecipeController::class, 'generateDishes'])->name('recipes.generate');
});
