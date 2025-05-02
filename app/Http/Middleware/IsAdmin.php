<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Vérifie si l'utilisateur est un admin
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // On vérifie si l'utilisateur est connecté
        // Après on vérifie s'il est le admin
        if(Auth::check() && Auth::user()->is_admin){
            // On l'autorise à continuer
            return $next($request);
        }

        // Rediriger si non autorisé
        return redirect('/')->with('error', 'Accès refusé');

    }
}
