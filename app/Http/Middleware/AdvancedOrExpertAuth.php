<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdvancedOrExpertAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->guest()){
            //flash("Vous devez être connecté pour voir cette page.")->error();
            session()->put('js_message', "Vous devez être connecté pour voir cette page.");
            return redirect('/connexion');
        }

        if(auth()->user()->niveau === 'Avancé' || auth()->user()->niveau === 'Expert') {
            return $next($request);
        }
        //flash("Vous n'avez pas le niveau requis pour cela.")->error();
        session()->put('js_message2', "Vous n'avez pas le niveau requis pour accéder à ce module");
        return redirect('/visualisation');
    }
} 