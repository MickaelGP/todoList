<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{


    use AuthenticatesUsers;


    /**
     * Page de redirection après connexion réussie
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Constructeur du contrôleur
     *
     * Ajoute les middlewares `guest` et `throttle:login`
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('throttle:login')->except('logout');
    }
}
