<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='prices';
    protected $guarded = [];
    protected $appends = array('title');


    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()};
    }
}
