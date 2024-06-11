<?php

namespace App\Http\Traits;

use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;

trait ImageTrait
{
    public function singleImageUpload($img, $for, $name)
    {

        $ext = $img->getClientOriginalExtension();
        $img = $img->move("images/" . $for . "s", $name . "_" . time() . "." . $ext);
        $newImage = Image::create([
            'src' => $img,
            'for' => $for
        ]);
        return $newImage;
    }
}