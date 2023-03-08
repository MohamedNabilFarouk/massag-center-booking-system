<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use App\Http\Controllers\Provider\Driver;

class OrderCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check if order have driver without taking any action and assign it to another driver';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       // return Command::SUCCESS;
        $orders = \App\Models\Order::whereNotNull('driver_id')->where('driver_status_id',0)->get();
        // dd($orders);
        foreach ($orders as $order)
        {
            $provider = \App\Models\Provider::where('id',$order->provider_id)->first();
            $Zone = Zone($provider->lat, $provider->lng);

            $country = Country($provider->lat, $provider->lng);
            $countryObject = \App\Models\Countries::where("iso3", $country)->first();
            $offset = 2 * $countryObject->offset;

            $zoneids = nearestZones($provider->lat, $provider->lng, $offset);

            if (!$countryObject->nearest_zones) {
                $zoneids = [$Zone->id];
            }
            $drivers = \App\Models\Driver::whereIn('zone_id',$zoneids)->where('status',1)->get()->pluck('id')->toArray();
            $old_driver = \App\Models\DriverOrders::where('order_id',$order->id)->get()->pluck('driver_id')->toArray();
//            dd($old_driver);
//            $new_driver = \App\Models\Driver::whereNotIn('id',$drivers)->where('status',1)->get()->pluck('id')->toarray();
                $new_driver = array_diff($drivers, $old_driver);
                // dd($new_driver);
                if (!empty($new_driver)) {
                $randomdriver= Arr::random($new_driver, 1);
                // dd($randomdriver);
                    \App\Http\Controllers\Provider\Driver::getCron($randomdriver[0],$order->id);

            }

        }

    }
}
