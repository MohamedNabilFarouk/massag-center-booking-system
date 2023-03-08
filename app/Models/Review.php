<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $appends = array('review_text');

    public function user(){
    return $this->belongsTo(User::class, 'user_id');
    }






    public function getReviewTextAttribute()
    {
        if($this->overall == 1){
            return 'Terrible';

        }else if($this->overall == 2){
            return 'Poor';
        }else if($this->overall == 3){
            return 'Good';
        }else if($this->overall == 4){
            return 'Great';
        }else if($this->overall == 5){
            return 'Fantastic';
        }
    }

    // public function booking(){
    //     return $this->hasMany(Booking::class,'booking_id');
    //     }

}
