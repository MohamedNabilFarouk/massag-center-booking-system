<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends BaseModel {

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

    public function setMetaKeywordsAttribute($value) {
        $this->attributes['meta_keywords'] = str_replace(",", ", ", $value);
    }

    public function paragraphs() {
        return $this->hasMany('App\Models\Paragraph');
    }

}
