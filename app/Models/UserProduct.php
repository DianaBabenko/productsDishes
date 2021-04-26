<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
}
