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
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!$request->user()) {
            return redirect('login');
        }

        if (!in_array($request->user()->role, $roles)) {
            abort(403, 'Unauthorized access. Required role: ' . implode(' or ', $roles));
        }

        return $next($request);
    }
}
