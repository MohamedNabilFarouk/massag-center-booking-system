<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Libs\Misc;
use Request;

class Paragraph extends BaseModel {

    protected $guarded = [
        'main_image'
    ];

    public static function boot() {
        parent::boot();
        static::deleted(function($row) {
            if ($row->main_image) {
                Misc::deleteImage($row->main_image);
            }
        });
    }

    public function admin() {
        return $this->belongsTo('App\Models\Admin');
    }

    public function page() {
        return $this->belongsTo('App\Models\Page');
    }
}