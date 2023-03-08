<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Carbon\Carbon;
use App\Models\Reservation;
use App\Models\Review;
use App\Models\User;
class dashboardController extends Controller
{

    public function charts(){


// new booking today
        $newBookings = Reservation::whereDate('created_at', Carbon::today())->count();
// TODAY CHECKOUTS NUMBER
        $todayCheckout= Reservation::whereDate('checkout_date', Carbon::today())->count();
// TODAY CHECKIN NUMBER
        $todayCheckin= Reservation::whereDate('checkin_date', Carbon::today())->count();
//recent bookings
    $recentBookings = Reservation::orderBy('id','DESC')->limit(20)->get();
//latest reviews
        $latest_reviews = Review::orderBy('id','DESC')->limit(30)->get();
 //Total reservation in website
        $totalReservation= Reservation::count();
//Total Customers in website
        $totalCustomers = User::count();
// total income from reservations
$totalReservation= Reservation::sum('total_price');
        // dd($totalCustomers);


// charts basic
        // must install laravel charts ' composer require laraveldaily/laravel-charts  '
    $chart_options1 = [
        'chart_title' => 'Users by days',
        'report_type' => 'group_by_date',
        'model' => 'App\Models\User',
        'group_by_field' => 'created_at',
        'group_by_period' => 'day',
        'chart_type' => 'bar',
    ];
    $chart = new LaravelChart($chart_options1);

//  dd($chart);
    return view('site.dashboard', compact('chart'));
}

}
