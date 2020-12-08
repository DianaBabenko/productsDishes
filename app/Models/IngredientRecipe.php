<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class
 */
class IngredientRecipe extends Pivot
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'recipe_id',
        'product_id'
    ];


}
