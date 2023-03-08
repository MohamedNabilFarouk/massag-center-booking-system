<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Team;
use App\Models\Package;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportBooking;
use App\Libs\Adminauth;
use Carbon\Carbon;
class BookingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::orderBy('id','DESC')->with('user','team','package')->paginate(20);
    $prof= Team::all();
    $package= Package::all();
        return view('admin.bookings.index', compact('bookings','prof','package'));
    }

    public function filter(Request $request){
        // $request['prof_id'] ='1';
    // $request['from'] ='2022-10-16';
    // $request['to'] ='2022-10-19';
    //  dd($request->all());
    
    $prof= Team::all();
    $package= Package::all();
    if(($request->from) != null && ($request->to) == null){
        $request['to']= $request->from;
    }
    // dd($request->to);
            $bookings = Booking::where([[function($q) use($request) {
    
    
                if($request->prof_id != '' && ($request->from) == null){
                    // echo 'PROF';
    
                    $q->Where('prof_id', $request->input('prof_id'));
                    $q->orWhere('special_prof_id', $request->input('prof_id'));
    
                } else if($request->package_id != '' && ($request->from) == null){
                    //  echo 'PACKAGE';
                    // dd('package');
                    $q->Where('package_id',$request->input('package_id'));
    
                 }else if(($request->from) != null && (($request->prof_id) == null) && (($request->package_id) == null)){
                    // echo 'Date';
                    $q->WhereBetween('from',[$request->input("from") , carbon::parse($request->input("to"))->addDay()]);
    
                    // $q->where([['from',$request->from],['to',$request->to]]);
                    $q->orWhereBetween('special_from',[$request->input("from") ,  carbon::parse($request->input("to"))->addDay()]);
    
    
                }else if((($request->from) != null) && (($request->prof_id) != null)){
                    $prof_type = Team::findOrFail($request->prof_id);
                // dd('date and prof');
                if($prof_type->is_special == 1){
                    $q->WhereBetween('from',[$request->input("from") , carbon::parse($request->input("to"))->addDay()])->where('special_prof_id', $request->input('prof_id'))->orWhere('prof_id', $request->input('prof_id'));
                    $q->orWhereBetween('special_from',[$request->input("from") ,  carbon::parse($request->input("to"))->addDay()])->where('special_prof_id', $request->input('prof_id'))->orWhere('prof_id', $request->input('prof_id'));
                }else{
                $q->WhereBetween('from',[$request->input("from") , carbon::parse($request->input("to"))->addDay()])->where('prof_id', $request->input('prof_id'))->orWhere('special_prof_id', $request->input('prof_id'));
                $q->orWhereBetween('special_from',[$request->input("from") ,  carbon::parse($request->input("to"))->addDay()])->where('prof_id', $request->input('prof_id'))->orWhere('special_prof_id', $request->input('prof_id'));
                }
                }else if((($request->from) != null) && (($request->package_id) != null)){
                    // dd('date and prof');
                    $q->WhereBetween('from',[$request->input("from") , carbon::parse($request->input("to"))->addDay()])->where('package_id', $request->input('package_id'));
                    $q->orWhereBetween('special_from',[$request->input("from") ,  carbon::parse($request->input("to"))->addDay()])->where('package_id', $request->input('package_id'));
                }
    
    
    
            //   dd($q) ;
            }]])->orderBy('id','DESC')->paginate(20);
    
    
            return view('admin.bookings.index', compact('bookings','prof','package'));
    
        }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id, $notifi_id=NULL)
    {
        // dd($notifi_id);
        $booking = Booking ::findOrFail($id);


        // $notification =  Adminauth::user()->notifications()->where('id', $notifi_id)->first();
        // if($notification){
        //     $notification->markAsRead();

        // }

        return view('admin.bookings.details', compact('booking'));
    }

    public function read($id){
        $userUnreadNotification = auth()->user()
                                  ->unreadNotifications
                                  ->where('id', $id)
                                  ->first();
                                  if($userUnreadNotification) {
                                    $userUnreadNotification->markAsRead();
                                  }
                                  return back();
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
// dd($request->all());
// dd($request->is_canceled);
        $booking = Booking ::findOrFail($id);
        // dd((bool)$request->input('is_canceled'));

if($request->has('is_canceled')){
       $booking-> is_canceled = $request->input('is_canceled') ;
}
if($request->has('is_paid')){
    // dd($request->all());
       $booking-> is_paid = $request->input('is_paid');
}

            $booking->save();
        session() -> flash('success', __('Updated successfully'));
        return redirect() -> route('booking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $booking = Booking ::findOrFail($id);
        $booking ->  delete();


        session() -> flash('success',__('deleted successfully'));
        return redirect() -> route('booking.index');
    }

    public function exportBookings(Booking $booking){
        return Excel::download(new ExportBooking($booking), 'bookings.xlsx');
    }


    public function editBooking($id){
        $allPackages = Package::all();
        $team = Team::where('status','1')->get();
        $booking = Booking::findOrFail($id);
    return view('admin.bookings.edit',compact('booking','allPackages','team'));
}

public function updateBooking(Request $request ,$id){
    // dd($request->all());


    $data = $request -> validate([
        // 'phone' => 'required|string|max:100',
        // 'email' => 'required|email',
        'from' =>  'required_without:special_from',
        'special_from' => 'required_without:from',
        'package_id'=> 'required',
    ]);
    // dd(Carbon::createFromFormat('Y m d h:i A', $request -> from));
    $data =$request->all();
    $booking = Booking::findOrFail($id);
    $package=   Package::where('id',$request->package_id)->first();

    // $data['from'] =     Carbon::parse($request -> from) ;
    if($request->has('from')){
        $data['from'] =     Carbon::createFromFormat('Y/m/d h:i A', $request -> from) ;
        $data['to'] =     Carbon::createFromFormat('Y/m/d h:i A', $request -> from)->addMinutes($package->duration) ;
    }else{
        $data['from'] = null;
        $data['to'] = null;
    }

    if($request->has('special_from')){
        $data['special_from'] =     Carbon::createFromFormat('Y/m/d h:i A', $request -> special_from) ;
        $data['special_to'] =     Carbon::createFromFormat('Y/m/d h:i A', $request -> special_from)->addMinutes(40) ;

    }else{
        $data['special_from'] = null;
        $data['special_to'] = null;
    }

    $data['total']= $package->price ;
    $booking->update($data);
    session() -> flash('success', __('Booked successfully'));
    return redirect()->route('booking.index');
}


}
