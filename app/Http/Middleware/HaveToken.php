<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HaveToken
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
        if (!$token) {
            $msgs = new \stdClass;
            $msgs->en = "You are not authenticated";
            $msgs->ar = "غير مصرح بالدخول";
            if ($request->header("lang") == "en") {
                $msgs = $msgs->en;
            } else {
                $msgs = $msgs->ar;
            }
            return response()->json(['isSuccessed' =>false,"data"=>null,'error'=>$msgs], 401);
        }

        return $next($request);
    }
}
