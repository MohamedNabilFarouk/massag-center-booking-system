<?php

namespace App\Http\Middleware;

use Closure;
use App\Libs\Adminauth;

class AdminIsAuthnticated
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd(Adminauth::user());
        if (Adminauth::user()) {
            return redirect('admin/dashboard');
        }
        return $next($request);
    }
}
