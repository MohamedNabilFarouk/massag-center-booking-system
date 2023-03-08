<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $appends = array('title','des');




    protected static function boot() {
        parent::boot();


    static::creating(function($activity) {


        $slug = \Str::slug(str_replace(['%','/','"\"'],'-',$activity->title_en));

        $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();


        $activity->slug = $count ? "{$slug}-{$count}" : $slug;

    });
    }




    public function getmainimageAttribute($value)
    {
        return asset('uploads/products/' . $value);
    } // end of get image attribute




    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()};
    }
    public function getDesAttribute()
    {
        return $this->{'des_'.app()->getLocale()};
    }


    public function gallery(){

        return $this->hasMany(ProductGallery::class, 'product_id');
    }
}

