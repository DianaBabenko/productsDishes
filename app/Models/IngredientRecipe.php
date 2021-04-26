<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class IngredientRecipe
 * @package App\Models
 * @property int id
 * @property int recipe_id
 * @property int product_id
 * @property int count
 * @property array product_substitutes
 */
class IngredientRecipe extends Pivot
{
    public $timestamps = false;

    protected $table = 'product_recipe';

    /**
     * @var array
     */
    protected $fillable = [
        'recipe_id',
        'product_id',
        'count',
        'measurement_id',
        'product_substitutes'
    ];

    /**
     * @return BelongsTo
     */
    public function measurement(): BelongsTo
    {
        return $this->belongsTo(Measurement::class, 'measurement_id');
    }

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * @return BelongsTo
     */
    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }

    // : TODO relations in properties
}
