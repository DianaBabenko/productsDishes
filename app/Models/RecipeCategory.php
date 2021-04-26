<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class RecipeCategory
 *
 * @package App\Models
 * @property int id
 * @property string name
 * @property string image
 */
class RecipeCategory extends Model
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
     * @return string
     */
    public function getUrl(): string
    {
        return Storage::disk('recipe_categories')->url($this->image);
    }
}
