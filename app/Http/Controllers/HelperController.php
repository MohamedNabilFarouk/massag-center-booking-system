<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Form;
class HelperController extends Controller {
    public function __construct() {
    }


    public function getCustomer(Request $request){
        header('Content-Type: application/json; charset=utf-8');

        $jsonStr = '{
            "resourceType": "Customer",
            "id": "d75f81b6-66bc-4fc8-b2b4-0d193a1a92e0",
            "meta": {
                "versionId": "1",
                "lastUpdated": "2021-01-17T01:00:49.795+00:00"
            },
            "name": [
                {
                    "use": "official",
                    "text": "Sam Fhirman",
                    "family": "Fhirman",
                    "given": [
                        "Sam"
                    ],
                    "prefix": [
                        "Mr"
                    ]
                }
            ],
            "telecom": [
                {
                    "system": "phone",
                    "value": "+61481059995",
                    "use": "mobile"
                }
            ],
            "gender": "male",
            "birthDate": "1973-09-30",
            "address": [
                {
                    "use": "work",
                    "line": [
                        "400 George Street"
                    ],
                    "city": "Brisbane",
                    "state": "QLD",
                    "postalCode": "4000",
                    "country": "AUS"
                }
            ],
            "maritalStatus": {
                "coding": [
                    {
                        "code": "M",
                        "display": "Married"
                    }
                ]
            }
        }';

        echo $jsonStr;
    }

    public function anyGetEmployee(Request $request){
        if($request->order_id){
            $row = \App\Models\Order::where("id",$request->order_id)->first();
            if($row->employee_id){
                return response()->json(['isSuccessed' =>true,"data"=>$row->employee_id,'error'=>null], 200);
            }else{
                return response()->json(['isSuccessed' =>true,"data"=>1,'error'=>null], 200);
            }
        }

    }
    public function anyNotificationSender(Request $request){
        $rows = \App\Models\NotificationScheduler::groupBy('client_id')->get();
        foreach($rows as $row){
            send_notification(json_decode($row->notification));
            $row->delete();
        }
    }

    public function anyToken(Request $request) {
        $token = $request->token;
        $tokenobj = null;
        if($request->type == 'provider'){
            $tokenobj = \App\Models\ProviderToken::where("token",$token)->first();
        }
        elseif($request->type == 'customer'){
            $tokenobj = \App\Models\CustomerToken::where("token",$token)->first();
        }
        elseif($request->type == 'driver'){
            $tokenobj = \App\Models\DriverToken::where("token",$token)->first();
        }
        elseif($request->type == 'admin'){
            $tokenobj = \App\Models\AdminToken::where("token",$token)->first();
        }

        if($tokenobj){
            return response()->json(['isSuccessed' =>true,"data"=>null,'error'=>null], 200);
        }else{
            return response()->json(['isSuccessed' =>false,"data"=>null,'error'=>null], 200);
        }
    }

    public function anySendPushNewMessage(Request $request) {
        $type = $request->type;
        $sendTo = $request->send_to;
        $device_ids = [];
        if($request->type == 'provider'){
            $pre_count = \App\Models\ProviderNotification::where('provider_id',$sendTo)->latest()->take(15)->get();
            $count = $pre_count->where('readed',0)->count();
            \App\Models\ProviderNotification::create(["provider_id"=>$sendTo,"message"=>"You received new message","relation_object"=>"message","relation_id"=>$request->order_id,"message_ar"=>"تم استلام رسالة جديد  "]);
            $device_ids = \App\Models\ProviderToken::where("provider_id",$sendTo)
                        ->whereNotNull("device_id")->get()->pluck("device_id")->toArray();
        }elseif($request->type == 'customer'){
            $pre_count = \App\Models\CustomerNotification::where('customer_id',$sendTo)->latest()->take(15)->get();
            $count = $pre_count->where('readed',0)->count();
            \App\Models\CustomerNotification::create(["customer_id"=>$sendTo,"message"=>"You received new message","relation_object"=>"message","relation_id"=>$request->order_id,"message_ar"=>"تم استلام رسالة جديد  "]);
            $device_ids = \App\Models\CustomerToken::where("customer_id",$sendTo)
                        ->whereNotNull("device_id")->get()->pluck("device_id")->toArray();
        }elseif($request->type == 'admin'){
            if($request->messageSender == "customer"){
                $pre_count = \App\Models\AdminNotification::where('admin_id',1)->latest()->take(15)->get();
                $count = $pre_count->where('readed',0)->count();
                \App\Models\AdminNotification::create(["admin_id"=>1,"message"=>"You have new message","relation_id"=>$request->send_to,"relation_object"=>"New_Message_Customer","message_ar"=>"لديك رسالة جديدة"]);
            }elseif($request->messageSender == "driver"){
                $pre_count = \App\Models\AdminNotification::where('admin_id',1)->latest()->take(15)->get();
                $count = $pre_count->where('readed',0)->count();
                \App\Models\AdminNotification::create(["admin_id"=>1,"message"=>"You have new message","relation_id"=>$request->send_to,"relation_object"=>"New_Message_Driver","message_ar"=>"لديك رسالة جديدة"]);
            }
            else{
                $pre_count = \App\Models\AdminNotification::where('admin_id',1)->latest()->take(15)->get();
                $count = $pre_count->where('readed',0)->count();
                \App\Models\AdminNotification::create(["admin_id"=>1,"message"=>"You have new message","relation_id"=>$request->send_to,"relation_object"=>"New_Message_Provider","message_ar"=>"لديك رسالة جديدة"]);
            }

        }

        if($device_ids){
            $fields = array (
                'registration_ids' => $device_ids,
                'notification' => array (
                    "title" => "رسالة جديدة",
                    "identifier" => "message",
                    "body" => "رسالة جديدة",
                    "sound" => "default",
                    "badge" => $count,
                ),
                'data' => array (
                    "title" => "رسالة جديدة",
                    "identifier" => "message",
                    "body" => "رسالة جديدة",
                    "sound" => "default",
                    "badge" => $count,
                )
            );
            if($request->order_id){
                $order = \App\Models\Order::where("id",$request->order_id)->first();
                $fields['data']['customer_img'] = $order->customer->profile_img;
                $fields['notification']['customer_img'] =  $fields['data']['customer_img'];

                $images = $order->provider->images;
                $fields['data']['provider_img'] = $images[0]->image_name;
                $fields['notification']['provider_img'] =  $fields['data']['provider_img'];

                $fields['data']['customer_name'] = $order->customer->name;
                $fields['notification']['customer_name'] =  $fields['data']['customer_name'];

                $fields['data']['provider_name'] = $order->provider->name;
                $fields['notification']['provider_name'] =  $fields['data']['provider_name'];

                $fields['notification']['order_id'] = $request->order_id;
                $fields['data']['order_id'] = $request->order_id;
            }
            send_notification($fields);
        }
        return response()->json(['isSuccessed' =>true,"data"=>null,'error'=>null], 200);

    }
}
