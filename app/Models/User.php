<?php

namespace App\Models;

use App\Http\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

/**
 * Class User
 * @package App\Models
 * @property string name
 * @property string surname
 * @property string patronymic
 * @property string email
 * @property string password
 * @property string image
 */
class User extends Authenticatable
{
    use ImageTrait, Notifiable;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'email',
        'password',
        'image'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return BelongsToMany
     */
    public function product(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'user_product',
            'product_id',
            'user_id',
            'id',
            'id'
        );
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return Storage::disk('users')->url($this->image);
    }
}
