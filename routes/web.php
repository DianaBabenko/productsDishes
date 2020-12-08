<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

$group = [
    'middleware' => ['auth'],
];

$methods = ['index', 'edit', 'update', 'create', 'store', 'show', 'destroy'];

Route::resource('recipes', \App\Http\Controllers\Recipe\RecipeCategoryController::class)
    ->only(['index'])
    ->names('recipes');

Route::get('recipes/subcategory/{id}', [\App\Http\Controllers\Recipe\RecipeController::class, 'index'])->name('recipes.subcategory.index');
Route::get('recipes/subcategory/{id}/show/{recipe_id}', [\App\Http\Controllers\Recipe\RecipeController::class, 'show'])->name('recipes.subcategory.show');


Route::group($group, static function () use ($methods) {
    Route::resource('account', \App\Http\Controllers\UserController::class)
        ->only($methods)
        ->names('account');


    Route::get('products/categories', [\App\Http\Controllers\Product\ProductCategoryController::class, 'index'])->name('products.categories.index');
    Route::post('products/categories', [\App\Http\Controllers\Product\ProductController::class, 'save'])->name('products.categories.save');

    Route::get('products/edit/{id}', [\App\Http\Controllers\Product\ProductController::class, 'edit'])->name('products.edit');
    Route::post('products/edit/{id}', [\App\Http\Controllers\Product\ProductController::class, 'update'])->name('products.update');

    Route::get('recipes/generate', [\App\Http\Controllers\Recipe\RecipeController::class, 'generateDishes'])->name('recipes.generate');

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
