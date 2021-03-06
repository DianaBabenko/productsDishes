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
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'name'
    ];
}
