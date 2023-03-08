<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApprovedByAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $hash = trim($request->header("token"));
        $token = \App\Models\ProviderToken::whereToken($hash)->first();
        $provider = $token->provider;
        if ($token) {

            $approved =  \App\Models\Provider::where('id',$provider->id)->where('status',1)->orwhere('status',4)->first();
            if (!$approved) {

                $msgs = new \stdClass;
                if($request->header("lang")=="en"){
                    $msgs->en = "You are not Approved by Admin";

                }else{
                    $msgs->ar = "أنت غير موافق عليك من قبل المسؤول";
                }
                return response()->json(['isSuccessed' => false,"data"=>null,'error'=>$msgs], 200);
            }


        }
        return $next($request);
    }
}
