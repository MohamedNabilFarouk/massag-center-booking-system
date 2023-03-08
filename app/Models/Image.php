<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Libs\Misc;
use Request;

class Image extends BaseModel {

    protected $guarded = [
        'image_name'
    ];

    public static function boot() {
        parent::boot();
        static::deleted(function($row) {
            if ($row->image_name) {
                Misc::deleteImage($row->image_name);
            }
        });
    }

    public function imageable() {
        return $this->morphTo();
    }


    public function admin() {
        return $this->belongsTo('App\Models\Admin');
    }
    public function product() {
        return $this->belongsTo('App\Models\Product','imageable_id');
    }
}
