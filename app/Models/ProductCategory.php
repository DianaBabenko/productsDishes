<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductCategory
 *
 * @package App\Models
 * @property int id
 * @property string name
 */
class ProductCategory extends Model
{
    protected $fillable = [
        'name'
    ];
}
