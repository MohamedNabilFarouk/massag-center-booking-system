<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Libs\Misc;
use Request;

class News extends BaseModel {

    protected $guarded = [
        'main_image',
        'images'
    ];
    protected $table='news';
    protected $appends = array('title_field','content_field','summary_field');

    public static function boot() {
        parent::boot();
        static::deleted(function($row) {
            if ($row->main_image) {
                Misc::deleteImage($row->main_image);
            }
            $images = $row->images()->get();
            if ($images) {
                foreach ($images as $img) {
                    Misc::deleteImage(@$img->image_name);
                }
            }
            $row->images()->delete();
        });
    }

    public function getmainimageAttribute($value)
    {
        return asset('uploads/' . $value);
    } // end of get image attribute


    public function getTitleFieldAttribute()
{
    if(app()->getLocale()=='ar'){
        return $this->{'title_'.app()->getLocale()};
    }else{
        return $this->title;
    }

}
public function getContentFieldAttribute()
{
    if(app()->getLocale()=='ar'){
        return $this->{'content_'.app()->getLocale()};
    }else{
        return $this->content;
    }

}
public function getSummaryFieldAttribute()
{
    if(app()->getLocale()=='ar'){
        return $this->{'summary_'.app()->getLocale()};
    }else{
        return $this->summary;
    }

}

    public function admin() {
        return $this->belongsTo('App\Models\Admin');
    }

    public function images() {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public function getOtherImagesAttribute() {
        return $this->images->pluck('image_name', 'id')->toArray();
    }

}
