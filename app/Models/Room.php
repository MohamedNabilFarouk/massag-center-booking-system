<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Libs\Misc;
use Request;
use Illuminate\Support\Str;

class Room extends BaseModel {

    protected $guarded = [
    ];
    protected $hidden = [];
    protected $appends = array('title_field','des_field');

    public $table = "rooms";




    public function setTitleAttribute($value)
{
    $this->attributes['title'] = $value;
    $this->attributes['slug'] = Str::slug($value,'-');
    if (static::whereSlug($slug = Str::slug($value))->exists()) {

        $slug = $this->incrementSlug($slug);
        $this->attributes['slug'] = $slug;
    }
}

public function getTitleFieldAttribute()
{
    if(app()->getLocale()=='ar'){
        return $this->{'title_'.app()->getLocale()};
    }else{
        return $this->title;
    }

}
public function getDesFieldAttribute($value)
{
    if(app()->getLocale()=='ar'){
        return $this->{'title_'.app()->getLocale()};
    }else{
        return $this->value;
    }

}


public function incrementSlug($slug) {

    $original = $slug;

    $count = 2;

    while (static::whereSlug($slug)->exists()) {

        $slug = "{$original}-" . $count++;
    }

    return $slug;

}


    public function getmainimageAttribute($value)
    {
        return asset('uploads/rooms/' . $value);
    } // end of get image attribute

    public function room_facility(){
        return $this->belongsToMany(RoomFacility::class, 'room_facilities_relation', 'room_id', 'facility_id');
    }

    public function room_bed(){
        return $this->belongsToMany(BedType::class, 'room_beds', 'room_id', 'bed_id');
    }
    public function room_bathroom(){
        return $this->belongsToMany(PrivateBathroom::class, 'room_bathrom_relation', 'room_id', 'facility_id');
    }


    public function gallery(){

        return $this->hasMany(RoomGallery::class, 'room_id');
    }
}
