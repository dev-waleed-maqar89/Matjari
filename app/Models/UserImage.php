<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
    use HasFactory;
    protected $fillable = [
        'user_id',
        'image_id',
        'active'
    ];
}
