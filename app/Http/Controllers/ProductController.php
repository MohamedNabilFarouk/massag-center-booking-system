<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Hash;
use Mail;

use Config;
use Session;
use Validator;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Order;
use App\Models\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\NewOrderNotification;
use Notification;
use App;
class ProductController extends Controller
{
        public function getCheckout( $slug){
    $product=    Product::where('slug',$slug)->first();
                return view('site.checkout',compact('product'));
        }

        public function shopSearch(Request $request){

// dd($request->all());
            $price =explode(",", $request->range);


            $products = Product::Where([['title_'.App::getLocale() ,'like', '%' . $request->title . '%'],[function($q) use($request ,$price) {
// old price range
                // if(($request->range) != null ){
                //     // echo 'price';
                //      $q->whereBetween('price',[$price[0] , $price[1]]);
                //  }
// new price range
                if((($request->min) != null) && (($request->max) != null)  ){
                    // echo 'price';
                     $q->whereBetween('price',[$request->min , $request->max]);
                 }


            }]])->paginate(6);

            // if(($request->min) != null || ($request->max != null)){

            //     $products= $products->whereBetween('price',[$request->min , $request->max])->get();
            // }

// dd($products);
            return view('site.shop',compact('products'));
}


public function placeOrder(Request $request){
    // dd($request->all());
    $data = $request -> validate([
        'name' => 'required|string|max:100',
        'email' => 'required|string',
        'phone' => 'required',
    ]);
    $product =Product::findOrFail($request->product_id);
    $data = $request->all();
    $data['total'] = $product->price;
    $data['user_id'] = Auth::user()->id;

    DB::beginTransaction();
    try{
    $order= Order::create($data);

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
        "date"=> $order->created_at,
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
          "item"=> $product->title_en,
          "description"=> strip_tags($product->des_en),
          "unit_price"=> $product->price,
          "quantity"=> 1,
          "tax1"=> 0,
          "tax2"=> 0,
          "product_id"=> $product->id,
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
    //   "InvoiceCustomField"=> [],
    "Deposit"=> [],
    "InvoiceReminder"=> [],
    "Document"=> [],
    "DocumentTitle"=> []

];
// end daftara's api body
    $api_key ="a473ec63020d7293489b16e4fa6219f3ed6b3891";
    // $api_key =env('DAFTARA_API_KEY');


    $httpClient = new \GuzzleHttp\Client(); // guzzle 6.3
    //  dd($httpClient);
    $response = $httpClient->request('post', 'https://massagemajed.daftra.com/api2/invoices?Default=".json"&Value=".json"', [
        'headers' => [
            'Content-type' => 'application/json',
            'APIKEY'=>$api_key
        ],
        'body' => json_encode($body),

    ]);

    // dd($response);


    $admins = Admin::all();
    $details=['product'=>$product,
                'date'=>$order->created_at
];

Notification::send($admins, new NewOrderNotification($details));
DB::commit();
session() -> flash('success', __('Successfully'));
return redirect()->route('get.homepage');
}
catch (Exception $e) {

    DB::rollback();
    session() -> flash('Error', __('Something went wrong'));
    return redirect()->route('get.homepage');
}

    return redirect()->route('get.homepage');
}
}

