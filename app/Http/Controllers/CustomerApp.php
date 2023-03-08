<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Session;
use Form;
class CustomerApp extends Controller {
    public function __construct() {
        //$this->middleware('CustomerAuthenticate');
    }
}
