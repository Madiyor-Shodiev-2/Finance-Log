<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale');

        if(in_array($locale, ['en', 'ru'])) {
            app()->setLocale($locale);
            session()->put('locale', $locale);
        } else {
            // Fallback to default locale if the provided one is not valid
            app()->setLocale(config('app.locale'));
        }

        return $next($request);
    }
}
