<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PreventMultipleGuards
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth('client')->check()) {
            abort(403, 'Access Denied: Clients cannot access Admin routes.');
        }

        return $next($request);
    }
}
