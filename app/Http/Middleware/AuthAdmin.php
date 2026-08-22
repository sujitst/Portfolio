<?php
namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;


class AuthAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
         if(Auth::check()) {
            if(Auth::user()->utype === 'adm') {
                return $next($request);
            } else {
                Session::flash('error', 'You are not authorized to access this page.');
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }
    }
}