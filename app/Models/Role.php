<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends BaseModel {

    protected $guarded = [
        //  'slug',
    ];

    public function admins() {
        return $this->hasMany('App\Models\Admin','role_id');
    }
    
    public function createdby() {
        return $this->belongsTo('App\Models\Admin','created_by');
    }
    public function updatedby() {
        return $this->belongsTo('App\Models\Admin','updated_by');
    }
    public function permissions() {
        return $this->belongsToMany('App\Models\Permission', 'group_permissions', 'role_id', 'permission_id')
                              ->select(['category'])->distinct();
    }
    public function permissionsAll() {
        return $this->belongsToMany('App\Models\Permission', 'group_permissions', 'role_id', 'permission_id')->select(['slug'])->distinct();
    }

    public function permissionsAlltitle() {
        return $this->belongsToMany('App\Models\Permission', 'group_permissions', 'role_id', 'permission_id')->select(['title'])->distinct();
    }
}
