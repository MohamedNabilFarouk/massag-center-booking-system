<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class CustomerAuthenticate {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
      $row = \App\Models\User::whereToken($request->input("token"))->first();
        if (!$row) {
          $message = 'Unauthorized user';
          $ar_message = 'غير مصرح';
          return response()->json(['result_code' => 1,'flags'=>new \stdClass,'list'=>[],'message' =>['en'=>$message,'ar'=>$ar_message]], 200);
        }
        if (@$row->id) {
            if (!@$row->published) {
              $message = 'Unauthorized user';
              $ar_message = 'غير مصرح';
              return response()->json(['result_code' => 1,'flags'=>new \stdClass,'list'=>[],'message' =>['en'=>$message,'ar'=>$ar_message]], 200);
            }
        }

        return $next($request);
    }
}
