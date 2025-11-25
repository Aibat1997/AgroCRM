<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiLocalization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $requestedLocale = $request->header('X-Language', config('app.locale'));
        $local = in_array($requestedLocale, config('app.supported_locales')) ? $requestedLocale : config('app.locale');
        app()->setLocale($local);

        return $next($request);
    }
}
