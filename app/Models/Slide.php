<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Libs\Misc;
use Request;

class Slide extends BaseModel {

    protected $guarded = [
        'main_image',
    ];

    public static function boot() {
        parent::boot();
        static::deleted(function($row) {
            if ($row->big_image) {
                Misc::deleteImage($row->big_image);
            }
            if ($row->small_image) {
                Misc::deleteImage($row->small_image);
            }
        });
    }

    public function admin() {
        return $this->belongsTo('App\Models\Admin');
    }
}