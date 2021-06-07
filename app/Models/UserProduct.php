<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserProduct
 * @package App\Models
 * @property int id
 * @property int product_id
 * @property int user_id
*/
class UserProduct extends Model
{
    protected $table = 'user_product';

    /**
     * @var array
     */
    protected $fillable = [
        'product_id',
        'user_id'
    ];

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
