<?php

namespace App\Http\Middleware;

use Closure;
use App\Libs\Adminauth;
use App\Libs\DashboardACL;
use Request;
use Session;
use Form;
use App;

class DashboardAclAuthenticate {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Request::is("admin/images/delete/*")) {
            return $next($request);
        }
        ////////////////////////////////////////////////// permisssion
        $except = ['edit-account-admins', 'change-password-admins', 'dashboard'];
        $path = explode("/", Request::path());
        if(@$path[0] == "ar"){
             if (@$path[3]) {
                if (@$path[3] == '' || @$path[3] == 'index')
                    $path[3] = 'view';
                if (@$path[3] == 'feature')
                    $path[3] = 'edit';
                $roleName = @$path[3] . "-" . @$path[2];
            }
            else {
                $roleName = $path[2];
            }
        }else{
            if (@$path[2]) {
                if (@$path[2] == '' || @$path[2] == 'index')
                    $path[2] = 'view';
                if (@$path[2] == 'feature')
                    $path[2] = 'edit';
                $roleName = @$path[2] . "-" . @$path[1];
            }
            else {
                $roleName = $path[1];
            }
        }
       
        // dd(session('admin_user'));
        if (!in_array($roleName, $except)) {
            if (DashboardACL::cant($roleName)) {
                //abort(403, 'Unauthorized action.');
                flash()->error(trans("admin.You donot have the permission to access this page"));
                return redirect("admin/dashboard");
            };
        }
        ///////////////////////////////////// permisssion
        return $next($request);
    }

}
