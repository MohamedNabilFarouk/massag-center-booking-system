<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Auth;

class ReviewController extends Controller
{
    //
    public function store(Request $request){

        //  dd($request->all());
        $data = $request -> validate([
            'overall' => 'required',
            'room_service' => 'required',
            'staff' => 'required',
            'comfort' => 'required',
            'location' => 'required',
            'free_wifi' => 'required',
            'comment' => 'required',

        ]);

        $data['user_id']= Auth::user()->id;
        $data['booking_id']='12'; // STATIC FOR TEST to be dynamic getg booking id or booking number here
       if( Review::create($data)){
            session() -> flash('success', trans('added successfully'));
       }else{
        session() -> flash('Error', trans('Error In Adding Review'));
       }

        return redirect()->back();

    }
}
