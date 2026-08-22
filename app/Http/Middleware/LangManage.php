<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class LangManage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('lang_code')) {
            App::setLocale(session('lang_code'));
        }

        // RTL / LTR set
        session([
            'text_dir' => session('lang_code') === 'ar' ? 'rtl' : 'ltr'
        ]);

        return $next($request);
    }
}