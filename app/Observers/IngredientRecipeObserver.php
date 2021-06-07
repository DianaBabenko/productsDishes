<?php

namespace App\Observers;


use App\Models\IngredientRecipe;

class IngredientRecipeObserver
{
    /**
     * @param IngredientRecipe $ingredientRecipe
     */
    public function creating(IngredientRecipe $ingredientRecipe): void
    {
        $ingredientRecipe->product_substitutes = null;
    }
}
