<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
         $supportedLanguages = ['en', 'ar'];
        
        // Get language from session or use default
        $locale = session('locale', config('app.locale', 'en'));
        
        // Validate the locale is supported
        if (!in_array($locale, $supportedLanguages)) {
            $locale = 'en';
        }
        
        // Set the application locale
        App::setLocale($locale);

        return $next($request);
    }
}
