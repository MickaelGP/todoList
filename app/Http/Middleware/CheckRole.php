<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Vérification du rôle de l'utilisateur
     *
     * @param Request $request La requête HTTP
     * @param Closure $next Le prochain middleware ou contrôleur à exécuter
     * @return Response La réponse HTTP
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifier si l'utilisateur est connecté et possède le rôle d'administrateur
        if ($request->user() && $request->user()->role === 'admin') {

            // Si l'utilisateur est autorisé, on continue la chaîne de middleware
            return $next($request);
        }

        // Si l'utilisateur n'est pas autorisé, on le redirige vers une page d'erreur ou d'accueil
        return redirect()->route('welcome');
    }
}
