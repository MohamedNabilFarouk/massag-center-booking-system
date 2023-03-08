<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Libs\Misc;
use Request;

class PrivateBathroom extends BaseModel {

    protected $guarded = [
    ];
    protected $hidden = [];

    public $table = "private_bathroom";

    protected $appends = array('title');
    public function getTitleFieldAttribute()
    {
        if(app()->getLocale()=='ar'){
            return $this->{'title_'.app()->getLocale()};
        }else{
            return $this->title;
        }
    }
    public function room(){
        return $this->belongsToMany(Room::class, 'room_bathrom_relation', 'facility_id', 'room_id');
    }

}
