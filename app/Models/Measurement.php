<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Measurement
 * @package App\Models
 * @property int id
 * @property string title
 * @property string type
 */
class Measurement extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
      'title',
      'type'
    ];
}
