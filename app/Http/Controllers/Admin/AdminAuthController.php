<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\ACL;
use App\Libs\Adminauth;
use Config;
use App\Models\Admin;
use Session;
use Mail;
class AdminAuthController extends Controller {

    public $model;
    public $module;

    public function __construct(Admin $model) {
        $this->middleware('AdminIsAuth', ['except' => ['getLogout']]);
        if (!Session::has('configs')) {
            $configs =getConfigs();
            Session::put('configs', $configs);
        }
        $this->module = 'auth';
        $this->model = $model;
    }

    public function getLogin() {
        $row = $this->model;
        return view('admin.' . $this->module . '.login',
            ['row' => $row, 'module' => $this->module]);
    }

    public function postLogin(Request $request) {

        $this->validate($request,
            [
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);
        if ($row = Adminauth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
             $arr=[
            "action"=>"تم تسجيل دخول",
            "admin_id"=>Adminauth::user()->id,
            "admin_name"=>Adminauth::user()->name
            ];
            //\App\Models\ActionLog::create($arr);
            return redirect('admin/dashboard');
        }
        else {
            flash()->error(trans('admin.Invalid email or password'));
            return back()->withInput();
        }
    }

    public function getForgotPassword() {
        $row = $this->model;
        return view('admin.' . $this->module . '.forgot_password',
            ['row' => $row, 'module' => $this->module]);
    }

    public function postForgotPassword(Request $request) {
        $this->validate($request,
            [
            'email' => 'required|email',
        ]);
        $row = $this->model->whereEmail($request->input('email'))->first();
        if (!$row) {
            flash()->error(trans('admin.This email is not exist'));
            return back()->withInput();
        }
        else {
            $password = str_random(8);
            $row->password = $password;
            $row->save();
            $configs = Session::get('configs');
            try {
                Mail::send('emails.admins.password',
                    ['row' => $row, 'configs' => $configs, 'password' => $password],
                    function ($mail) use ($row, $configs) {
                    $mail->to($row->email, $row->name)->subject('Your new password at ' . env('SITE_TITLE'));
                });
            }
            catch (Exception $e) {
                // echo 'Caught exception: ', $e->getMessage(), "\n";
            }
             $arr=[
            "action"=>"تم استرجاع الرقم السري",
            "admin_id"=>$row->id,
            "admin_name"=>$row->name
            ];
            flash()->success(trans('admin.New password has been sent to your email'));
            return back();
        }
    }

    public function getLogout() {
         $arr=[
            "action"=>"تم تسجيل خروج",
            "admin_id"=>Adminauth::user()->id,
            "admin_name"=>Adminauth::user()->name
            ];
        Adminauth::logout();
        return redirect('admin/auth/login');
    }
}
