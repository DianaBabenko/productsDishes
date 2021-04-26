<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class RecipeSubcategory
 *
 * @package App\Models
 * @property int id
 * @property string name
 * @property int category_id
 */
class RecipeSubcategory extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'image'
    ];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(RecipeCategory::class, 'category_id', 'id');
    }
}
