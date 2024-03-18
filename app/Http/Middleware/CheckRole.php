<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ... $roles): Response
    {
        if (in_array($request->user()->role, $roles)) {
            return $next($request);
        }

        switch ($roles) {
            case 'ADMIN':
                return redirect('/admin');
                break;
            case 'STAFF':
                return redirect('/staff');
                break;
            default:
                return redirect('/login');
                break;
        }
    }
}
