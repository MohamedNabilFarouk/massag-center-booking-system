<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Administrator;

class OrdersController extends Administrator
{
    public function __construct(Request $request, Admin $model)
    {
        $this->module = 'auth';
        $this->model = $model;
        // dd($request);
    }

    public function getIndex()
    {   $orders =\App\Models\Order::with(["orderProducts.product.images", "status", "customer", "address", "payment"])

            ->paginate();
            return view('admin.orders.orders')->with(["orders" => $orders]);
    }

    public function getCompleted()
    {
        $orders = \App\Models\Order::with(["orderProducts.product.images", "status", "customer", "address", "payment"])
        ->whereIn('status_id',[4,8])
        ->paginate();
            return view('admin.orders.completed')->with(["orders" => $orders]);
    }


    public function getPending()
    {
        $orders = \App\Models\Order::with(["orderProducts.product.images", "status", "customer", "address", "payment"])
        ->where('status_id',1)
        ->paginate();
            return view('admin.orders.pending')->with(["orders" => $orders]);
    }
    public function getRejected()
    {
        $orders = \App\Models\Order::with(["orderProducts.product.images", "status", "customer", "address", "payment"])
        ->where('status_id',6)
        ->paginate();
            return view('admin.orders.rejected')->with(["orders" => $orders]);
    }
    public function getView($id)
    {
        $orders = \App\Models\Order::with(["orderProducts","orderProducts.product.images", "status", "customer", "address", "payment"])
        ->where('id',$id)
        ->first();
            return view('admin.orders.order-details')->with(["orders" => $orders]);
    }
    public function getAcceptOrReject(Request $request,$id,$acceptance){

            $row = \App\Models\Order::where("id",$id)->first();
            $fields=[];
            $customer = \App\Models\Customer::where("id",$row->client_id)->first();

            $device_ids = \App\Models\CustomerToken::where("customer_id",$row->client_id)
                    ->whereNotNull("device_id")->get()->pluck("device_id")->toArray();
             $pre_count = \App\Models\CustomerNotification::where('customer_id',$row->client_id)->latest()->take(15)->get();
            $count = $pre_count->where('readed',0)->count();


            if($row->status_id == 5){
                $msgs = new \stdClass;
                $msgs->en = "Customer cancelled the order";
                $msgs->ar = "العميل قام بالغاء الطلب";
                if($request->header("lang")=="en"){
                    $msgs=$msgs->en;
                }else{
                    $msgs=$msgs->ar;
                }

                if($row->payment_method != 57){
                    $customer->wallet = $customer->wallet + $row->total_amount + $row->delivery_fees;
                }else{
                    if($row->wallet_amount){
                        $customer->wallet = $customer->wallet + $row->wallet_amount;
                    }
                }
                $customer->save();

                return redirect()->back()
                ->with('error',$msgs);
            }
            if ($row->status_id != 1) {
                $msgs = new \stdClass;
                $msgs->en = "action already taken to this order";
                $msgs->ar = "تم اتخاذ الإجراء بالفعل لهذا الأمر";
                if($request->header("lang")=="en"){
                    $msgs=$msgs->en;
                }else{
                    $msgs=$msgs->ar;
                }
                return redirect()->back()
                ->with('error',$msgs);
            }

            if($acceptance)
            {
                $row->status_id=2;
                $row->preparing_start_time = date("Y-m-d H:i:s");

                $fields = array (
                    'registration_ids' => $device_ids,
                    'notification' => array (
                        "title" => "تم قبول الطلب",
                        "body" => "تم قبول الطلب",
                        "order_id"=>$row->id,
                        "sound" => "notify.mp3",
                        "badge" => $count,
                    ),
                    'data' => array (
                        "title" => "تم قبول الطلب",
                        "body" => "تم قبول الطلب",
                        "order_id"=>$row->id,
                        "sound" => "notify.mp3",
                        "badge" => $count,
                    )
                );

                \App\Models\CustomerNotification::create(["customer_id"=>$row->client_id,"message"=>"Provider accepted your order","relation_id"=>$row->id,"relation_object"=>"orders","message_ar"=>"تم قبول طلبك"]);
            }
            else
            {
                $row->status_id=6;
                $fields = array (
                    'registration_ids' => $device_ids,
                    'notification' => array (
                        "title" => "تم رفض الطلب",
                        "body" => "تم رفض الطلب",
                        "order_id"=>$row->id,
                    ),
                    'data' => array (
                        "title" => "تم رفض الطلب",
                        "body" => "تم رفض الطلب",
                        "order_id"=>$row->id,
                    )
                );
                if($row->payment_method == 58){
                    $customer->wallet = $customer->wallet+($row->total_amount + $row->delivery_fees);
                }

                if($row->payment_method == 57){
                    if($row->wallet_amount){
                        $customer->wallet = $customer->wallet+$row->wallet_amount;
                    }
                }
                $customer->save();
                $order_products =\App\Models\OrderProduct::where('order_id',$row->id)->get();
                foreach($order_products as $product)
                {
                    $pro =  \App\Models\Product::where('id',$product->product_id)->first();
                    $product_stock = \App\Models\ProductStocks::where('product_id',$product->product_id)->first();
                    $product_stock->quantity = $product_stock->quantity + $product->count;
                    $product_stock->save();
                }
                  \App\Models\CustomerNotification::create(["customer_id"=>$row->client_id,"message"=>"Provider rejected your order","relation_id"=>$row->id,"relation_object"=>"orders","message_ar"=>"تم رفض طلبك"]);

            }
            $row->save();


            if($device_ids){
                send_notification($fields);
            }

            $row->status =  $row->status;
            $row->customer =  $row->customer;
            $row->address =  $row->address;
            $row->promo =  $row->promo;
            $products=[];
            $orderItems = $row->orderProducts;
            foreach($orderItems as $orderItem){
                $product = \App\Models\Product::with("images")->where("id",$orderItem->product_id)->first();
                 $product->count = $orderItem->count;
                $product->notes = $orderItem->notes;
                $product->amount = $orderItem->amount;
                $product->total_amount = $orderItem->total_amount;
                $products[] = $product;
            }
            $row->products = $products;
            unset( $row->orderProducts);

            return redirect()->back()
                        ->with('success','Order Accepted successfully.');
 }

}
