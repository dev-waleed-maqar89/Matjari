<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'state', 'completed_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function products()
    {
        return $this->hasMany(CartProduct::class);
    }

    public function getAmountAttribute()
    {
        $amount = 0;
        foreach ($this->products()->get() as $product) {
            $amount += $product->amount;
        }
        return $amount;
    }

    public function getNextStateAttribute()
    {
        $state = $this->state;
        switch ($state) {
            case 'pending':
                return 'approved';
            case 'approved':
                return 'moved';
            case 'moved':
                return 'completed';
            default:
                return '';
        };
    }
}