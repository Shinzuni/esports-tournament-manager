<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = Session::get('locale');
        if (!$locale) {
            $preferredLanguages = $request->getLanguages();
            $locale = collect($preferredLanguages)
                ->first(function ($lang) {
                    return in_array($lang, ['en', 'lv']);
                }, 'en');
            Session::put('locale', $locale);
        }
        App::setLocale($locale);
        return $next($request);
    }
}
