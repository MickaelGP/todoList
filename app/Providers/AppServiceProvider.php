<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    /**
     * Démarrage des services
     *
     * Cette méthode est appelée au démarrage de l'application.
     * Limite la tentative de connexion à 5 par minute
     * Si la limite est dépassée, la réponse renvoie une redirection vers la page d'accueil
     * avec un message d'erreur indiquant un nombre excessif de tentatives.
     */
    public function boot(): void
    {
        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->response(function (){
                return redirect()->route('welcome')->withErrors('Trop de tentatives veuillez patienter.');
            });
        });
    }
}
