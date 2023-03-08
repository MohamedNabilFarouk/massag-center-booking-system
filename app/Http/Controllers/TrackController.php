<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Form;
use Predis\Client;

class TrackController extends Controller {
    public function __construct() {
    }

    public function getLiveTrack(Request $request){
        return view('live-track', []);
    }

    public function getOrderTrackPath(Request $request){
        $order = \App\Models\Order::where("id",$request->order_id)->first();
        $client = new Client([
            'scheme' => 'tcp',
            'host'   => 'redis',
            'port'   => 6379,
        ]);
        $points = $client->executeRaw(['lrange', 'driver_'.$request->order_id, '0',"-1"]);

        return view('order-track-path', ["points"=>$points]);
    }

}
