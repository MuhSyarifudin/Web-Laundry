<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (Auth::user()->hak_akses != "Admin") {
            return redirect()->back();
        }
        return $next($request);
    }
}
