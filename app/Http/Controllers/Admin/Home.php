<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Administrator;
use Illuminate\Http\Request;
use App\Libs\ACL;
use App\Libs\Adminauth;
use Config;
use App\Models\Admin;
use Session;
use Mail;
use Hash;
use App;
use App\Models\User;
use App\Models\Booking;
use App\Models\Order;
use App\Models\Team;
use App\Models\Product;
use Carbon\Carbon;

class Home extends Administrator {

    public function __construct() {
        parent::__construct();
    }

    public function getIndex() {

$bookings = Booking::orderBy('id','desc')->get();
$todayBookings = Booking::whereDate('from',Carbon::today())->orWhereDate('special_from',Carbon::today())->orderBy('id','ASC')->get();
// dd($todayBookings);
$orders = Order::orderBy('id','desc')->get();
$last7DaysOrders = Order::whereDate('created_at','>=',Carbon::today()->subDays( 7 ))->with('product')->orderBy('id','desc')->get();
// dd($last7DaysOrders);
$customers = User::all();
$products = Product::all();
// $customers = User::all();

        return view('admin.dashboard.index',compact('bookings','todayBookings','orders','last7DaysOrders','customers','products'));
    }

    public function markNotification( $id)
{
    // $notification =  App\Libs\Adminauth::user()->notifications()->where('id', $id)->delete();
    $notification =  App\Libs\Adminauth::user()->notifications()->where('id', $id)->first();
    $notification->markAsRead();

// dd(App\Libs\Adminauth::user()->unreadNotifications()->count());

        return redirect()->back();


}

    function ArabicDate() {
        $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
        $your_date = date('y-m-d'); // The Current Date
        $en_month = date("M", strtotime($your_date));
        foreach ($months as $en => $ar) {
            if ($en == $en_month) { $ar_month = $ar; }
        }

        $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
        $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
        $ar_day_format = date('D'); // The Current Day
        $ar_day = str_replace($find, $replace, $ar_day_format);

        header('Content-Type: text/html; charset=utf-8');
        $standard = array("0","1","2","3","4","5","6","7","8","9");
        $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
        $current_date = $ar_day.' '.date('d').' / '.$ar_month.' / '.date('Y');
        $arabic_date = str_replace($standard , $eastern_arabic_symbols , $current_date);

        return $arabic_date;
    }
}
