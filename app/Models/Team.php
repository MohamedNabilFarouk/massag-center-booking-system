<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table ='team';
    protected $guarded =[];
    protected $appends = array('title','des');

    public function getImageAttribute($value)
    {
        return asset('uploads/team/' . $value);
    } // end of get image attribute




    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()};
    }
    public function getDesAttribute()
    {
        return $this->{'des_'.app()->getLocale()};
    }
}
