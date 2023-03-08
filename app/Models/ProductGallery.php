<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    use HasFactory;

    protected $table='product_gallery';
    protected $guarded=[];

    public function getImageAttribute($value)
    {
        return asset('uploads/products/' . $value);
    } // end of get image attribute


}
