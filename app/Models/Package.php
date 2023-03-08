<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Package extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $appends = array('title','des');




    protected static function boot() {
        parent::boot();


    static::creating(function($activity) {


        $slug = \Str::slug($activity->title_en);

        $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();


        $activity->slug = $count ? "{$slug}-{$count}" : $slug;

    });
    }





    public function getTitleAttribute()
    {
        return $this->{'title_'.app()->getLocale()};
    }
    public function getDesAttribute()
    {
        return $this->{'des_'.app()->getLocale()};
    }


    public function package_service(){
        return $this->belongsToMany(Service::class, 'package_service', 'package_id', 'service_id');
    }
}
