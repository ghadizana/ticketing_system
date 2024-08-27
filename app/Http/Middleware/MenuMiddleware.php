<?php

namespace App\Http\Middleware;

use App\Models\Menu;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routes = Menu::firstWhere('baseUrl', $request->route()?->getName());

        return blank($routes) || (bool) $routes->status && $request->user()->can($routes->namaMenu)
            ? $next($request)
            : redirect(RouteServiceProvider::HOME)->with('failed', 'you do not have access to this route!');

        return redirect(RouteServiceProvider::HOME)->with('failed', 'You do not have access to this route!');
    }
}
