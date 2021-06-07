<?php

namespace App\Models;

use Facade\FlareClient\Time\Time;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

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
 * @property string image
 * @property int user_id
 * @property int status
 * @property array statuses
 */
class Recipe extends Model
{
    public const STATUS_ACTIVE = 1;
    public const STATUS_IN_PROCESS = 2;
    public const STATUS_DENIED = 3;

    public const statuses = [
        self::STATUS_ACTIVE => 'active',
        self::STATUS_IN_PROCESS => 'in progress',
        self::STATUS_DENIED => 'denied',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'personCount',
        'cookTime',
        'ingredientsNumber',
        'subcategory_id',
        'image',
        'user_id',
        'status'
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
    public function productIngredients(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'product_recipe',
            'product_id',
            'recipe_id',
            'id',
            'id'
        );
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return Storage::disk('recipes')->url($this->image);
    }
}
