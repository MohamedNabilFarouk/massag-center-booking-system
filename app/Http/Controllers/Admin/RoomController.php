<?php

namespace App\Http\Controllers\Admin;
use App\Models\Room;
use App\Models\RoomGallery;
use App\Models\BedType;
use App\Models\PrivateBathroom;
use App\Models\RoomFacility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\imagesTrait;
use Illuminate\Support\Facades\Storage;
class RoomController extends Controller
{
    use imagesTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('here');
        $rooms = Room ::paginate(10);
        return view('admin.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beds = BedType::all();
        $bathrooms = PrivateBathroom::all();
        $facilities = RoomFacility::all();
        return view('admin.room.create',compact('beds','bathrooms','facilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> validate([
            'title' => 'required|string|max:100',
            'night_price' => 'required',
            'night_price_with_breakfast' => 'required',
            'main_image'=> 'required|image|mimes:jpg,png,jpeg'
        ]);
        $data = $request->except(['facility','bed','bathroom','gallery']);
        if ($request -> has('main_image')) {
            $image = $this -> saveImages($request -> main_image, 'uploads/rooms');
            $data['main_image'] = $image;
        }

        $data['with_kitchen'] = $request -> with_kitchen ? $request -> with_kitchen : '0' ;
        $data['car_parking'] = $request -> car_parking ? $request -> car_parking : '0' ;

        // dd($data);
        DB::beginTransaction();
         if($room = Room::create($data))   {
        // start save room many to many relations
                    $room->room_facility()->sync($request->facility);
                    $room->room_bed()->sync($request->bed);
                    $room->room_bathroom()->sync($request->bathroom);
        // end saving
        // start save room Gallery
            if ($request -> has('gallery')) {

                foreach($request->gallery as $i){

                    $image = $this -> saveImages($i, 'uploads/rooms');
                    $gallery = new RoomGallery();
                    $gallery->room_id = $room->id;
                    $gallery->image = $image;
                    $gallery->save();
                }
            // end of saving room gallery

            }

           DB::commit();

           session() -> flash('success', trans('added successfully'));
        }else{
           DB::rollback();

           session() -> flash('success', trans('Error'));
        }

        return redirect() -> route('Rooms.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $room = Room ::with('gallery')->findOrFail($id);
        $beds = BedType::with('room')-> get();
        $bathrooms = PrivateBathroom::with('room')-> get();
        $facilities = RoomFacility::with('room')-> get();
        return view('admin.room.edit', compact('room','beds','bathrooms','facilities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request -> validate([
            'title' => 'required|string|max:100',
            'night_price' => 'required',
            'night_price_with_breakfast' => 'required',
            'main_image'=> 'image|mimes:jpg,png,jpeg'
        ]);
        $room = Room::findOrFail($id);
        $data = $request->except(['facility','bed','bathroom','gallery']);

        if ($request -> has('main_image')) {
            Storage ::disk('public_uploads') -> delete($room -> main_image);
            $image = $this -> saveImages($request -> main_image, 'uploads/rooms');
            $data['main_image'] = $image;
        }
        $data['with_kitchen'] = $request -> with_kitchen ? $request -> with_kitchen : '0' ;
        $data['car_parking'] = $request -> car_parking ? $request -> car_parking : '0' ;
        DB::beginTransaction();
         if($room->update($data))   {

                    $room->room_facility()->sync($request->facility);
                    $room->room_bed()->sync($request->bed);
                    $room->room_bathroom()->sync($request->bathroom);


                // start save room Gallery
                if ($request -> has('gallery')) {
                    $room->gallery()->delete();
                    foreach($request->gallery as $i){
                        $image = $this -> saveImages($i, 'uploads/rooms');
                        $gallery = new RoomGallery();
                        $gallery->room_id = $room->id;
                        $gallery->image = $image;
                        $gallery->save();
                    }
                }
                // end of saving room gallery




           DB::commit();

           session() -> flash('success', trans('added successfully'));
        }else{
           DB::rollback();

           session() -> flash('success', trans('Error'));
        }

        return redirect() -> route('Rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room ::findOrFail($id);
        DB::beginTransaction();
        Storage::disk('public_uploads') -> delete( $room -> main_image);
        $room->room_facility()->detach();
        $room->room_bed()->detach();
        $room->room_bathroom()->detach();
        $room ->  delete();
        DB::commit();

        session() -> flash('success','deleted successfully');
        return redirect() -> route('Rooms.index');
    }
}
