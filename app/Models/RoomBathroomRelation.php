<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Libs\Misc;
use Request;

class RoomBathroomRelation extends BaseModel {

    protected $guarded = [
    ];
    protected $hidden = [];

    public $table = "room_bathrom_relation";

}
