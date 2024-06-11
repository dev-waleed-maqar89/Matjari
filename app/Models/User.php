<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Node\Stmt\Return_;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address'
    ];

    public function images()
    {
        return $this->hasMany(UserImage::class);
    }
    public function getProfilePicAttribute()
    {
        $img = '';
        $images = $this->images()->get();
        if (count($images)) {
            $img = $this->images()->where('active', 1)->first()->image;
        }
        return $img;
    }

    public function adminAcount()
    {
        return $this->hasOne(Admin::class);
    }

    public function getRoleAttribute()
    {
        $adminAccount = $this->adminAcount()->first();
        return $adminAccount ? $adminAccount->role : Null;
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function pendingCart()
    {
        return $this->carts()->where('state', 'pending')->first();
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}