<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RecipeCategory
 *
 * @package App\Models
 * @property int id
 * @property string name
 */
class RecipeCategory extends Model
{
    protected $fillable = [
        'name'
    ];
}
