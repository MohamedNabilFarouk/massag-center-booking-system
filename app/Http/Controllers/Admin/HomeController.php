<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Reservation;
class HomeController extends Controller
{
    public function __construct(Request $request, Admin $model)
    {
        $this->module = 'auth';
        $this->model = $model;
        // dd($request);
        $this->middleware(['AdminIsAuthnticated'], ['except' => ['getLogout']]);
    }
    public function index(Request $request)
    {
        // dd($request);
        $orders = \App\Models\Order::with(["orderProducts.product.images", "status", "customer", "address", "payment"])
            ->count();
        $profit = \App\Models\OrderProduct::whereHas('order', function ($q) {
            $q->whereIn('status_id', [4, 8]);
        })->sum('total_amount');
        $customer = \App\Models\Customer::whereIn('confirmed', [1, 2])->count();
        $employee = \App\Models\Admin::where('super_admin', 0)->count();

        $pending_orders = \App\Models\Order::with(["orderProducts.product.images", "status", "customer", "address", "payment"])
            ->where('status_id', 1)->count();
        $rejeced_orders = \App\Models\Order::with(["orderProducts.product.images", "status", "customer", "address", "payment"])
            ->where('status_id', 6)->count();
        $completed_orders = \App\Models\Order::with(["orderProducts.product.images", "status", "customer", "address", "payment"])
            ->whereIn('status_id', [4, 8])->count();
        $products = \App\Models\Product::all();
        foreach ($products as $product) {
            $low_stock = \App\Models\Product::whereHas('stock', function ($q) use ($product) {
                $q->where('quantity', '<=', ($product->quantity * 0.2));
            })->count();
        }
        $categories = \App\Models\Category::count();
        $ads = \App\Models\ProviderAd::count();

        $rows["total_products"]['data'] = $products->count();
        $rows["total_orders"]['data'] = $orders;
        // $rows["total_orders"]["url"] =  env('APP_URL')."/vendor/orders/0?page=2";
        $rows["total_sales"]['data'] = (float)$profit;
        // $rows["total_sales"]["url"] =  env('APP_URL')."/vendor/orders/0?page=2";
        $rows["total_customer"]['data'] = $customer;
        // $rows["total_customer"]["url"] =  env('APP_URL')."/vendor/orders/0?page=2";
        $rows["total_employee"]['data'] = $employee;
        // $rows["total_employee"]["url"] =  env('APP_URL')."/vendor/orders/0?page=2";
        $rows["pending_orders"]['data'] = $pending_orders;
        // $rows["pending_orders"]["url"] =  env('APP_URL')."/vendor/orders/0?page=2";
        $rows["rejected_orders"]['data'] = $rejeced_orders;
        // $rows["rejected_orders"]["url"] =  env('APP_URL')."/vendor/orders/0?page=2";
        $rows["low_stock"]['data'] = $low_stock;
        // $rows["low_stock"]["url"] =  env('APP_URL')."/vendor/orders/0?page=2";
        $rows["total_categories"]['data'] = $categories;
        $rows["total_ads"]['data'] = $ads;
        $rows["completed_orders"]['data'] = $completed_orders;

      ;

// new dashboard data

        $newBookings = Reservation::whereDate('created_at', Carbon::today())->count();
        //  dd($newBookings);


        return view('dashboard.home')->with(["rows" => $rows]);
    }
    //    public function lang_change(Request $request)
    //    {
    //        \App::setLocale($request->lang);
    //        session()->put('locale', $request->lang);
    ////        return view('language');
    //    }
}
