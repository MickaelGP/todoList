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
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifier si l'utilisateur est connecté
        if ($request->user() && $request->user()->role === 1) {
            return $next($request);
        }

        // Rediriger l'utilisateur vers une page d'erreur ou une autre page appropriée
        return redirect()->route('welcome');
    }
}
