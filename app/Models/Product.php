<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Product
 * @package App\Models
 * @property int id
 * @property int status
 * @property int category_id
 * @property string name
 * @property \DateTime expirationDate
 * @property string image
 */
class Product extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'category_id',
        'expirationDate',
        'image'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'expirationDate' => 'date'
    ];

    public static $STATUS_ACTIVE = 1; // активно
    public static $STATUS_FORBIDDEN = 2; // заборонено
    public static $STATUS_AVAILABLE = 3; // доступно

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

//     /**
//     * @return BelongsToMany
//     */
//    public function recipes(): BelongsToMany
//    {
//        return $this->belongsToMany(Recipe::class);
//    }

    /**
     * @return BelongsToMany
     */
    public function recipe(): BelongsToMany
    {
        return $this->belongsToMany(
            Recipe::class,
            'product_recipe',
            'recipe_id',
            'product_id',
            'id',
            'id'
        );
    }

    /**
     * @return BelongsToMany
     */
    public function user(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'user_product',
            'user_id',
            'product_id',
            'id',
            'id'
        );
    }
}
