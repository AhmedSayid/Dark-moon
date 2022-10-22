<?php

namespace App\Http\Middleware;

use App\Constants\UserTypes;
use Closure;
use Illuminate\Http\Request;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            if(auth()->user()->type == UserTypes::ADMIN){
                return $next($request);
            }
        }
        return redirect(route('Login..index'));
    }
}
