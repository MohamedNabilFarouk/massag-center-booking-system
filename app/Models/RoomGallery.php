<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomGallery extends Model
{
    //

    public function getImageAttribute($value)
    {
        return asset('uploads/rooms/' . $value);
    } // end of get image attribute



}

