<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderCron extends Controller
{
    public function __construct()
    {
    }

    public function getIndex(Request $request)
    {
        \Artisan::call('order:check');
    }
}
