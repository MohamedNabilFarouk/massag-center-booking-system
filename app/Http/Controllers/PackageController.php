<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Team;
use App\Models\Booking;
use App\Models\Admin;

use Carbon\CarbonPeriod;
use Carbon\Carbon;
use Auth;
use App\Notifications\NewBookingNotification;
use Illuminate\Support\Facades\DB;
use Notification;



use Carbon\CarbonImmutable;
use BusinessTime\Schedule;

class PackageController extends Controller
{

    public function getPackageBooking($slug){
        $package = Package::where('slug',$slug)->first();
        $allPackages = Package::all();
        $team = Team::where('status','1')->get();


    return view('site.booking_form',compact('package','allPackages','team'));
}




public function getAvailableSpecialTeamAjax($prof_id , $date,$package_id,$PACKAGE=NULL , $TIME=NULL ){
    //
//
// dd(Carbon::now());
$package = Package::where('id',$package_id)->first();
// $duration =$package->duration;
$duration ='15';
$package_duration = '45';



// dd($package->duration);
$current_time=Carbon::now()->toTimeString();
// dd(round($current_time)->addHours(1));
if($current_time >= "12:00:00" ){
// dd($current_time);
$time =Carbon::parse($current_time);
$time = $time->addHours(1)->format('H:00');
}else{

    $time = "12:00 PM";
}

$today =  today()->format('Y-m-d') . $time;
$at=$date;
    // $today =  Carbon::today()->startOfDay(); //yes
// }

$tomorrow =  today()->addDays('7')->format('Y-m-d')  . " 11:00 PM";
// $tomorrow =  Carbon::today()->addDays('7')->endOfDay(); // yes
// $period = new CarbonPeriod($today, $duration .' minutes', $tomorrow); // yes



$bookings = Booking::where([['special_prof_id',$prof_id],['is_canceled','0']])->Where(function($q) use($at){

    $q->WhereDate('special_from', Carbon::parse($at));
   //  $q->orWhere('to',$at);
})->get();
// dd($bookings);
// if(count($bookings) == 0){
//     $duration ='15';
// }



$period = new CarbonPeriod(new Carbon($today), $duration .'minutes', new Carbon($tomorrow));
// dd($period);
$slots = [];
$filterd = [];

$prof = Team::findOrFail($prof_id);

$offs=[];
array_push($offs, $prof->off_day);
// dd($period->toArray());

// $bookings = Booking::where([['prof_id',$prof_id],['is_canceled','0']])->Where(function($q) use($at){

//      $q->WhereDate('from', Carbon::parse($at));

// })->get();


// foreach ($period->toArray() as $index=> $item) {
// if(  ($item >='2023-01-23 19:00:00') &&($item <= '2023-01-23 21:30:00')){
//     echo $item->toTimeString() .'<br>';
// }
// }
// die();
//   dd($bookings);
if(count($bookings) > 0 ){


foreach ($period->toArray() as $index=> $item) {



    foreach($bookings as $book){
        // if($item->toDateString() == $at){
        //     // dd(Carbon::parse($book->to)); 1:30
        //     //  dd( $item->addMinutes($package->duration));
        // }

        // if(  $item->isBetween(Carbon::parse($book->from) , Carbon::parse($book->to))){
            // if(  ($item >= Carbon::parse($book->from)) && ($item < Carbon::parse($book->to)) |    ){
                // $period->toArray()[$index+1]
            //    dd(Carbon::parse($book->from)->diffInMinutes($item));
            // dd($item->addMinutes($package->duration));
    if(($item >= Carbon::parse($book->special_from)) && ($item < Carbon::parse($book->special_to))  || ($item < Carbon::parse($book->special_from)) && (Carbon::parse($book->special_from)->diffInMinutes($item) < $package_duration )      ){
//  echo $item->toTimeString() .'<br>';
            array_push($filterd, $item);
        }
        }

        // if( ! $item->isBetween(Carbon::parse($book->from) , Carbon::parse($book->to))){
            // if( ! ($item >= Carbon::parse($book->from)) && ($item <= Carbon::parse($book->to))){
                // echo $item->toTimeString() .'<br>';
            if(($item->toTimeString() >= "11:00:00") && ($item->toTimeString() <= "23:59:59") &&( !(in_array($item->toDateString(), $offs))) &&( !(in_array($item->format("Y/m/d h:i A"), $slots)))  &&( !(in_array($item, $filterd)))   &&($item->toDateString() == $at)&&(Carbon::parse($item)->addMinutes($package_duration) <= "23:59:59")){
                array_push($slots, $item->format("Y/m/d h:i A"));            // old
                // echo $item->toTimeString() .'<br>';

            }
        // }

    // }
}
//    die();

}else{
        // dd('here');
    foreach ($period->toArray() as $index=> $item) {
        //  echo $item .'<br>';
    if(($item->toTimeString() >= "11:00:00") && ($item->toTimeString() <= "24:00:00") &&( !(in_array($item->toDateString(), $offs)))&&($item->toDateString() == $at)&&(Carbon::parse($item)->addMinutes($package_duration) <= "24:00:00") ){
        array_push($slots, $item->format("Y/m/d h:i A"));            // old
    }
}

}
//  die();
return response() -> json(['data' => $slots]);
// foreach ($period->toArray() as $index=> $item) {

// if($booking == false){

//     // array_push($slots, $item->format("Y-m-d   h:i A "). '-' .$item->addHours(1)->format("h:i A") );
//     if(($item->toTimeString() >= "11:00:00") && ($item->toTimeString() <= "24:00:00") &&( !(in_array($item->toDateString(), $offs)))&&($item->toDateString() == $at)){
//         array_push($slots, $item->format("Y/m/d h:i A"));            // old
//         // array_push($slots, $item);            // new
//         // 01 Jan 1970 00:00:00 GMT
//         // $slots[$item->format("Y-m-d")][]=  $item->format("h:i A "); // new
//     }
// }

// }

//         //   dd($slots);



// return response() -> json(['data' => $slots]);
// return $slots;
//  dd($slots);


//
}















public function getAvailableSpecialTeamAjax__origi($prof_id , $date ,$PACKAGE=NULL , $TIME=NULL ){
// dd($TIME);

//     BusinessTime::enable(Carbon::class, [
//         'monday' => ['09:00-12:00', '13:00-18:00'],
//         'tuesday' => ['09:00-12:00', '13:00-18:00'],
//         'wednesday' => ['09:00-12:00'],
//         'thursday' => ['09:00-12:00', '13:00-18:00'],
//         'friday' => ['09:00-12:00', '13:00-20:00'],
//         'saturday' => ['09:00-12:00', '13:00-16:00'],
//       ]);

// $period = CarbonPeriod::create(
//     $opening,
//     static fn ($date) => $date->nextOpen(),
//     $closing,
// );

// foreach ($period as $slot) {
//   echo "$slot\n";
// }





// $TIME='13:00:00';

// $PACKAGE="3";



////////////////////////////////
// if you need to return all times between large package time

// if(isset($TIME)){
//     if(isset($PACKAGE)){
//     $pack=Package::findOrFail($PACKAGE);
//     }
//     $START =Carbon::parse($TIME)->toTimeString();
//     $END = Carbon::parse($TIME)->addMinutes($pack->duration)->toTimeString();
//     // dd($END);
//    }else{
//     $START = '11:00:00';
//     $END = "24:00:00";
//    }

// if you need to return all times from 11 am to 12 am

   $START = '11:00:00';
   $END = "24:00:00";
////////////////////////////////

    // dd($date);
    $current_time=Carbon::now()->toTimeString();
    // dd(round($current_time)->addHours(1));
    if($current_time >= "12:00:00" ){
    // dd($current_time);
    $time =Carbon::parse($current_time);
    $time = $time->addHours(1)->format('H:00');
    }else{

        $time = "12:00 PM";
    }





    $today =  today()->format('Y-m-d') . $time;
    $tomorrow =  today()->addDays('7')->format('Y-m-d')  . " 11:00 PM";

    // dd($period);
    $slots = [];
    $at=$date;
    // dd($at);
    $offs=[];
    $prof = Team::findOrFail($prof_id);
    array_push($offs, $prof->off_day);





    // start new update case if no bookings today deuration is 15 min




$bookings = Booking::where([['special_prof_id',$prof_id],['is_canceled','0']])->Where(function($q) use($at){

    $q->WhereDate('special_from', Carbon::parse($at));
   //  $q->orWhere('to',$at);
})->get();

// if(count($bookings) == 0){
//     $duration ='15';
// }else{
//     $duration = '40'; //by min
// }

$duration ='15';



// end new update case if no bookings today deuration is 15 min



$period = new CarbonPeriod(new Carbon($today), $duration.'minutes', new Carbon($tomorrow));









    foreach ($period as $index=> $item) {

    //  dd( $period) ;
        $booking = Booking::where([['special_prof_id',$prof_id],['is_canceled','0']])->Where(function($q) use($item ){
            $q->orWhere('special_from',$item);
        })->exists();
        // echo $booking;





        if($booking == false){
            // if(($item->toDateString() == $at)&& ($item->toTimeString() >= $START) && ($item->toTimeString() <= $END)){
            // echo $item . '<br>';
            // }
            // dd($date);
            //  dd($item->addHours(1)->toDateString());
            // array_push($slots, $item->format("Y-m-d   h:i A "). '-' .$item->addHours(1)->format("h:i A") );
            if(($item->toTimeString() >= $START) && ($item->toTimeString() <= $END) &&( !(in_array($item->toDateString(), $offs)))&&($item->toDateString() == $at)){
                array_push($slots, $item->format("Y/m/d h:i A"));            // old
                // array_push($slots, $item);            // new
                // 01 Jan 1970 00:00:00 GMT
                // $slots[$item->format("Y-m-d")][]=  $item->format("h:i A "); // new
            }
        }

        }
// die();
                //  dd($slots);



        return response() -> json(['data' => $slots]);


}






public function getAvailableTeamAjaxorigi($prof_id , $date,$package_id){
    //
//
// dd(Carbon::now());
$package = Package::where('id',$package_id)->first();
// dd($package->duration);
$current_time=Carbon::now()->toTimeString();
// dd(round($current_time)->addHours(1));
if($current_time >= "12:00:00" ){
// dd($current_time);
$time =Carbon::parse($current_time);
$time = $time->addHours(1)->format('H:00');
}else{

    $time = "12:00 PM";
}

$today =  today()->format('Y-m-d') . $time;
$tomorrow =  today()->addDays('7')->format('Y-m-d')  . " 11:00 PM";
$period = new CarbonPeriod(new Carbon($today), $package->duration .'minutes', new Carbon($tomorrow));
$slots = [];
$at=$date;
$offs=['2022-10-22','2022-10-13'];
// dd($period->toArray());
foreach ($period->toArray() as $index=> $item) {
// dd( $item->addHours(-1)) ;
    $booking = Booking::where([['prof_id',$prof_id],['is_canceled','0']])->Where(function($q) use($item ){
        $q->orWhere('from',$item);
        // $q->orWhere('special_prof_id',$special_prof_id);
        // $q->orWhereIn('package_id',['1']);
        // $q->orWhere('to',$item);
    // $q->WhereBetween('from',[$item, $item->addHours(1)]);
    // $q->orWhereBetween('to',[$item, $item->addHours(-1)]);
        })->exists();
    // ->orWhereBetween('to_date',[$request->from_date, $request->to_date])
    // ->orWhere(function($query) use($request){
    //     $query->where('from_date','<=',$request->from_date)
    //         ->where('to_date','>=',$request->to_date)
    // })->first();
//  dd($booking);
// dd('here');
//  dd($item->toDateString());
if($booking == false){

    // array_push($slots, $item->format("Y-m-d   h:i A "). '-' .$item->addHours(1)->format("h:i A") );
    if(($item->toTimeString() >= "11:00:00") && ($item->toTimeString() <= "24:00:00") &&( !(in_array($item->toDateString(), $offs)))&&($item->toDateString() == $at)){
        array_push($slots, $item->format("Y/m/d h:i A"));            // old
        // array_push($slots, $item);            // new
        // 01 Jan 1970 00:00:00 GMT
        // $slots[$item->format("Y-m-d")][]=  $item->format("h:i A "); // new
    }
}

}

        //  dd($slots);



return response() -> json(['data' => $slots]);
// return $slots;
//  dd($slots);


//
}






public function getAvailableTeamAjax($prof_id , $date,$package_id){
    //
//
// dd(Carbon::now());
$package = Package::where('id',$package_id)->first();
// $duration =$package->duration;
$duration ='15';




// dd($package->duration);
$current_time=Carbon::now()->toTimeString();
// dd(round($current_time)->addHours(1));
if($current_time >= "12:00:00" ){
// dd($current_time);
$time =Carbon::parse($current_time);
$time = $time->addHours(1)->format('H:00');
}else{

    $time = "12:00 PM";
}

$today =  today()->format('Y-m-d') . $time;
$at=$date;
    // $today =  Carbon::today()->startOfDay(); //yes
// }

$tomorrow =  today()->addDays('7')->format('Y-m-d')  . " 11:00 PM";
// $tomorrow =  Carbon::today()->addDays('7')->endOfDay(); // yes
// $period = new CarbonPeriod($today, $duration .' minutes', $tomorrow); // yes



$bookings = Booking::where([['prof_id',$prof_id],['is_canceled','0']])->Where(function($q) use($at){

    $q->WhereDate('from', Carbon::parse($at));
   //  $q->orWhere('to',$at);
})->get();

if(count($bookings) == 0){
    $duration =$duration;
    // $duration ='15';
}



$period = new CarbonPeriod(new Carbon($today), $duration .'minutes', new Carbon($tomorrow));
// dd($period);
$slots = [];
$filterd = [];

$prof = Team::findOrFail($prof_id);

$offs=[];
array_push($offs, $prof->off_day);
// dd($period->toArray());

// $bookings = Booking::where([['prof_id',$prof_id],['is_canceled','0']])->Where(function($q) use($at){

//      $q->WhereDate('from', Carbon::parse($at));

// })->get();


// foreach ($period->toArray() as $index=> $item) {
// if(  ($item >='2023-01-23 19:00:00') &&($item <= '2023-01-23 21:30:00')){
//     echo $item->toTimeString() .'<br>';
// }
// }
// die();
//   dd($bookings);
if(count($bookings) > 0 ){


foreach ($period->toArray() as $index=> $item) {



    foreach($bookings as $book){
        // if($item->toDateString() == $at){
        //     // dd(Carbon::parse($book->to)); 1:30
        //     //  dd( $item->addMinutes($package->duration));
        // }

        // if(  $item->isBetween(Carbon::parse($book->from) , Carbon::parse($book->to))){
            // if(  ($item >= Carbon::parse($book->from)) && ($item < Carbon::parse($book->to)) |    ){
                // $period->toArray()[$index+1]
            //    dd(Carbon::parse($book->from)->diffInMinutes($item));
            // dd($item->addMinutes($package->duration));
    if(($item >= Carbon::parse($book->from)) && ($item < Carbon::parse($book->to))  || ($item < Carbon::parse($book->from)) && (Carbon::parse($book->from)->diffInMinutes($item) < $package->duration )      ){
// echo $item->toTimeString() .'<br>';
            array_push($filterd, $item);
        }
        }

        // if( ! $item->isBetween(Carbon::parse($book->from) , Carbon::parse($book->to))){
            // if( ! ($item >= Carbon::parse($book->from)) && ($item <= Carbon::parse($book->to))){
                // echo $item->toTimeString() .'<br>';
            if(($item->toTimeString() >= "11:00:00") && ($item->toTimeString() <= "23:59:59") &&( !(in_array($item->toDateString(), $offs))) &&( !(in_array($item->format("Y/m/d h:i A"), $slots)))  &&( !(in_array($item, $filterd)))   &&($item->toDateString() == $at)&&(Carbon::parse($item)->addMinutes($package->duration) <= "23:59:59")){
                array_push($slots, $item->format("Y/m/d h:i A"));            // old
                // echo $item->toTimeString() .'<br>';

            }
        // }

    // }
}
//    die();

}else{
        // dd('here');
    foreach ($period->toArray() as $index=> $item) {
        //  echo $item .'<br>';
    if(($item->toTimeString() >= "11:00:00") && ($item->toTimeString() <= "24:00:00") &&( !(in_array($item->toDateString(), $offs)))&&($item->toDateString() == $at)&&(Carbon::parse($item)->addMinutes($package->duration) <= "24:00:00") ){
        array_push($slots, $item->format("Y/m/d h:i A"));            // old
    }
}

}
//  die();
return response() -> json(['data' => $slots]);
// foreach ($period->toArray() as $index=> $item) {

// if($booking == false){

//     // array_push($slots, $item->format("Y-m-d   h:i A "). '-' .$item->addHours(1)->format("h:i A") );
//     if(($item->toTimeString() >= "11:00:00") && ($item->toTimeString() <= "24:00:00") &&( !(in_array($item->toDateString(), $offs)))&&($item->toDateString() == $at)){
//         array_push($slots, $item->format("Y/m/d h:i A"));            // old
//         // array_push($slots, $item);            // new
//         // 01 Jan 1970 00:00:00 GMT
//         // $slots[$item->format("Y-m-d")][]=  $item->format("h:i A "); // new
//     }
// }

// }

//         //   dd($slots);



// return response() -> json(['data' => $slots]);
// return $slots;
//  dd($slots);


//
}














    public function getAllPackageBooking(){

        $allPackages = Package::all();
        $team = Team::all();



//

$today =  today()->format('Y-m-d') . " 2:00 PM";
$tomorrow =  today()->addDays('1')->format('Y-m-d')  . " 3:00 AM";
$period = new CarbonPeriod(new Carbon($today), '15 minutes', new Carbon($tomorrow));
$slots = [];
foreach ($period as $item) {
    array_push($slots, $item->format("h:i A"));
}
// dd($slots);


//




    return view('site.booking_form',compact('allPackages','team'));
}


public function booking(Request $request){
    //   dd($request->from);
        $data = $request -> validate([
            // 'phone' => 'required|string|max:100',
            // 'email' => 'required|email',
            'from' =>  'required_without:special_from',
            'special_from' => 'required_without:from',
            'full_name'=> 'max:200',
            'package_id'=> 'required',
        ]);
        // dd(Carbon::createFromFormat('Y m d h:i A', $request -> from));
        $data =$request->all();
        $package=   Package::where('id',$request->package_id)->first();
        if($package->with_special == 1){
            if(($request->special_from == null) ||($request->special_prof_id == null)){
                session() -> flash('Error', __('Moroco Bath Time Is Required'));
                return redirect()->back();

            }else if($request->from == null){
                session() -> flash('Error', __('Booking Time Is Required'));
                return redirect()->back();
            }
           
        }
        $data['is_first'] = $request -> is_first ? $request -> is_first : '0' ;
        $data['is_prof'] = $request -> is_prof ? $request -> is_prof : '0' ;
        $data['is_gift'] = $request -> is_gift ? $request -> is_gift : '0' ;
        // $data['from'] =     Carbon::parse($request -> from) ;
        if($request->has('from')){
            $data['from'] =     Carbon::createFromFormat('Y/m/d h:i A', $request -> from) ;
            $data['to'] =     Carbon::createFromFormat('Y/m/d h:i A', $request -> from)->addMinutes($package->duration) ;
        }

        if($request->has('special_from')){
            $data['special_from'] =     Carbon::createFromFormat('Y/m/d h:i A', $request -> special_from) ;
            $data['special_to'] =     Carbon::createFromFormat('Y/m/d h:i A', $request -> special_from)->addMinutes(45) ;

        }



        // $data['to'] =     Carbon::parse($request -> from)->addHours(1) ;
        $data['user_id'] =     Auth::user()->id ;

        $data['total']= $package->price ;
          DB::beginTransaction();
        try{
    if ($booking= Booking::create($data)) {
        $unique_id = uniqid();
        // daftara's api body
        $body= [
            'Invoice' => [
                "staff_id"=> 0,
                "subscription_id"=> 26,
                "store_id"=> 0,
                "no"=> $unique_id,
                "po_number"=> 26,
                "name"=> "string",
                "client_id"=> Auth::user()->id,
                "is_offline"=> true,
                "currency_code"=> "SAR",
                "client_business_name"=> Auth::user()->name,
                "client_first_name"=>Auth::user()->id ,

                "client_email"=> Auth::user()->email,

                // "client_postal_code"=> "string",
                // "client_city"=> "string",
                // "client_state"=> "string",
                // "client_country_code"=> "EG",
                "date"=> $booking->created_at,
                "draft"=> "0",
                "discount"=> 0,
                "discount_amount"=> 0,
                "deposit"=> 0,
                "deposit_type"=> 0,
                "notes"=> "string",
                "html_notes"=> "string",
                // "invoice_layout_id"=> 1,
                // "estimate_id"=> 0,
                // "shipping_options"=> "",
                // "shipping_amount"=> null,

                // "follow_up_status"=> null,
                // "work_order_id"=> null,
                // "requisition_delivery_status"=> null,
                // "pos_shift_id"=> null
            ],
            "InvoiceItem"=> [
                [
                  "invoice_id"=>$unique_id,
                  "item"=> $package->title_en,
                  "description"=> strip_tags($package->des_en),
                  "unit_price"=> $package->price,
                  "quantity"=> 1,
                  "tax1"=> 0,
                  "tax2"=> 0,
                  "product_id"=> $package->id,
                  "col_3"=> null,
                  "col_4"=> null,
                  "col_5"=> null,
                  "discount"=> 0,
                  "discount_type"=> "1 => Percentage",
                  "store_id"=> 0
                ]
              ],

              "Payment"=> [
              [
                  "payment_method"=> "string",
                  "amount"=> 0,
                  "transaction_id"=> "string",
                  "treasury_id"=> 0,
                  "date"=> "2022-11-08 06:29:22",
                  "staff_id"=> 0
                ]
              ],
            "Deposit"=> [],
            "InvoiceReminder"=> [],
            "Document"=> [],
            "DocumentTitle"=> []
        ];
        // end daftara's api body
    //  dd($booking);
        // $response= $this->daftara($body);


        // $api_key =env('DAFTARA_API_KEY');
        $api_key ="a473ec63020d7293489b16e4fa6219f3ed6b3891";


        $httpClient = new \GuzzleHttp\Client(); // guzzle 6.3
        //  dd($httpClient);
        $response = $httpClient->request('post', 'https://massagemajed.daftra.com/api2/invoices?Default=".json"&Value=".json"', [
            'headers' => [
                'Content-type' => 'application/json',
                'APIKEY'=>$api_key
            ],
            'body' => json_encode($body),

        ]);



    //  dd($response);

        // $response =json_decode($response->getBody());

        // if($response->code == 202){
        //     $booking->invoice_number = $response->invoice_number;
        //     $booking->save();
        // }
        //  dd(json_decode($response->getBody())->code);
        session() -> flash('success', __("Booked successfully"));


         }
         $details=['booking'=>$booking,
                    'package'=>$package
    ];

         $admins = Admin::all();

         Notification::send($admins, new NewBookingNotification($details));
     DB::commit();
        return redirect()->route('get.homepage');
        }catch (Exception $e) {
             DB::rollback();
            session() -> flash('Error', 'Something went wrong');
        }

         return redirect()->back();

    }

// not used func
public function daftara($body){

// return $body;

    // $api_key ='a473ec63020d7293489b16e4fa6219f3ed6b3891';
    $api_key =env('DAFTARA_API_KEY');

    $httpClient = new \GuzzleHttp\Client(); // guzzle 6.3
    //  dd($httpClient);
    $response = $httpClient->request('post', 'https://massagemajed.daftra.com/api2/invoices?Default=".json"&Value=".json', [
        'headers' => [
            'Content-type' => 'application/json',
            'APIKEY'=>$api_key
        ],
        'body' => json_encode($body),

    ]);
//  dd($response);
// print_r($response);
//   return json_decode( $response->getBody());
// die();
    //   return $response ;
}





public function editBooking($id){
    // dd('here');
        $allPackages = Package::all();
        $team = Team::where('status','1')->get();
    $booking = Booking::findOrFail($id);
    return view('site.updateBooking',compact('booking','allPackages','team'));
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

    if($booking->created_at->diffInHours(Carbon::now()) > 24){
        session() -> flash('Error', __("You cant Update this booking after 24 Hour"));
        return redirect()->route('site.profile');
    }



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
    session() -> flash('success', __("Booked successfully"));
    return redirect()->route('site.profile');
}





}





