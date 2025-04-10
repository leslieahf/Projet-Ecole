<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Auth
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
        return $next($request);
    }
}
