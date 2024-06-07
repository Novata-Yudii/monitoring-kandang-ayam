<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class is_admin
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->name == 'Admin'){
            return $next($request);
        }else{
            return redirect('/dashboard');
        }
    }
}
