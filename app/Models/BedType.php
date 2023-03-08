<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Libs\Misc;
use Request;

class BedType extends BaseModel {

    protected $guarded = [
    ];
    protected $hidden = [];

    public $table = "beds_types";
    protected $appends = array('title_field');
    public function getTitleFieldAttribute()
    {
        if(app()->getLocale()=='ar'){
            return $this->{'title_'.app()->getLocale()};
        }else{
            return $this->title;
        }
    }
    public function room(){
        return $this->belongsToMany(Room::class, 'room_beds', 'bed_id', 'room_id');
    }

}
