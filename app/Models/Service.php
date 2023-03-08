<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $appends = array('title','des');

    public function getmainimageAttribute($value)
    {
        return asset('uploads/services/' . $value);
    } // end of get image attribute




    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()};
    }
    public function getDesAttribute()
    {
        return $this->{'des_'.app()->getLocale()};
    }
    public function package(){
        return $this->belongsToMany(Package::class, 'package_service', 'service_id', 'package_id');
    }
}
