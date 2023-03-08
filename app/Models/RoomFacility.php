<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Libs\Misc;
use Request;

class RoomFacility extends BaseModel {

    protected $guarded = [
    ];
    protected $hidden = [];
    protected $appends = array('title');
    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()};
    }

    public $table = "room_facilities";

    public function room(){
        return $this->belongsToMany(Room::class, 'room_facilities_relation', 'facility_id', 'room_id');
    }

}
