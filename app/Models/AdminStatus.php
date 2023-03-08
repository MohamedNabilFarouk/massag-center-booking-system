<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminStatus extends BaseModel
{
    use HasFactory;
    protected $guarded = [
    ];
    protected $hidden = [];

    public $table = "admin_status";


    public function admin()
    {
         return $this->hasMany(Admin::class);

    }
}
