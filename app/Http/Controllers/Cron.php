<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Front;
use Config;
use App\Models\Message;
use App;
use Auth;
use DB;
use Session;
use Mail;

class Cron extends Front {

    public function __construct() {
        parent::__construct();
    }

    public function getIndex() {

    }

}
