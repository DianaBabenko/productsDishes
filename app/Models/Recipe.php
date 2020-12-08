<?php


namespace App\Models;

use Facade\FlareClient\Time\Time;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Recipe
 *
 * @package App\Models
 * @property int id
 * @property string name
 * @property string description
 * @property int personCount
 * @property time cookTime
 * @property int ingredientsNumber
 * @property int subcategory_id
 */
class Recipe extends Model
{
    protected $fillable = [
        'name', 'description', 'personCount', 'cookTime', 'ingredientsNumber', 'subcategory_id'
    ];

    /**
     * @return BelongsTo
     */
    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(RecipeSubcategory::class, 'subcategory_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
