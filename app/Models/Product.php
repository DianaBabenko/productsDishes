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
 */
class Product extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'status', 'category_id', 'expirationDate',
    ];

    protected $casts = [
        'expirationDate' => 'date'
    ];

    public static $STATUS_ACTIVE = 1;
    public static $STATUS_FORBIDDEN = 2;
    public static $STATUS_AVAILABLE = 3;

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class);
    }
}
