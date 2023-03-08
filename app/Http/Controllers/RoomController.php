<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomGallery;

class RoomController extends Controller
{
   public function roomDetails($id){

    $room = Room::with('gallery','room_facility','room_bed','room_bathroom')->findOrFail($id);
    // dd($room);
    return view('site.room_details',compact('room'));

   }
}
