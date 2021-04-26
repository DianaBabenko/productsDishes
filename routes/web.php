<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('recipes', [\App\Http\Controllers\Recipe\RecipeCategoryController::class, 'index'])->name('recipes.index');
Route::get('recipes/subcategory/{recipeSubcategory}', [\App\Http\Controllers\Recipe\RecipeController::class, 'index'])->name('recipes.subcategory.index');
Route::get('recipes/subcategory/{recipeSubcategory}/show/{recipe}', [\App\Http\Controllers\Recipe\RecipeController::class, 'show'])->name('recipes.subcategory.show');

Route::middleware(['auth'])->group(static function () {
    Route::prefix('account')->name('account.')->group(static function () {
        Route::get('/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('edit');
        Route::patch('/{user}/update', [\App\Http\Controllers\UserController::class, 'update'])->name('update');
        Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('index');
    });

    Route::get('products/categories', [\App\Http\Controllers\Product\ProductCategoryController::class, 'index'])->name('products.categories.index');
    Route::post('products/categories', [\App\Http\Controllers\Product\ProductController::class, 'save'])->name('products.categories.save');

    Route::get('products/edit/{product}', [\App\Http\Controllers\Product\ProductController::class, 'edit'])->name('products.edit');
    Route::post('products/edit/{product}', [\App\Http\Controllers\Product\ProductController::class, 'update'])->name('products.update');

    Route::get('recipes/generate', [\App\Http\Controllers\Recipe\RecipeController::class, 'generateDishes'])->name('recipes.generate');
});
