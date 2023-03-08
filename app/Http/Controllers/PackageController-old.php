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

class PackageController extends Controller
{

    public function getPackageBooking($slug){
        $package = Package::where('slug',$slug)->first();
        $allPackages = Package::all();
        $team = Team::all();


    return view('site.booking_form',compact('package','allPackages','team'));
}


public function getAvailableTeamAjax($prof_id , $date){
    //
//
// dd(Carbon::now());
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
$period = new CarbonPeriod(new Carbon($today), '60 minutes', new Carbon($tomorrow));
$slots = [];
$at=$date;
$offs=['2022-10-22','2022-10-13'];
foreach ($period as $index=> $item) {
// dd( $item->addHours(-1)) ;
    $booking = Booking::where([['prof_id',$prof_id],['is_canceled','0']])->Where(function($q) use($item){
        $q->orWhere('from',$item);
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
    if(($item->toTimeString() > "11:00:00") && ($item->toTimeString() < "24:00:00")&&( !(in_array($item->toDateString(), $offs)))&&($item->toDateString() == $at)){
        // array_push($slots, $item->format("Y-m-d h:i A"));            // old
        array_push($slots, $item);            // new
        // 01 Jan 1970 00:00:00 GMT
        // $slots[$item->format("Y-m-d")][]=  $item->format("h:i A "); // new
    }
}

}

    //   dd($slots);



return response() -> json(['data' => $slots]);
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
            'from' => 'required',
            'full_name'=> 'max:200',
            'package_id'=> 'required',
        ]);
        $data =$request->all();
        $data['is_first'] = $request -> is_first ? $request -> is_first : '0' ;
        $data['is_prof'] = $request -> is_prof ? $request -> is_prof : '0' ;
        $data['is_gift'] = $request -> is_gift ? $request -> is_gift : '0' ;
        $data['from'] =     Carbon::parse($request -> from) ;
        $data['to'] =     Carbon::parse($request -> from)->addHours(1) ;
        $data['user_id'] =     Auth::user()->id ;
         $package=   Package::where('id',$request->package_id)->first();
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
        session() -> flash('success', 'Booked successfully');


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
}
