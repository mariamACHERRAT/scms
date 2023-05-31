<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRoles
{
    public function handle(Request $request, Closure $next, $role)
    {
        if ($role === 'is_admin' && !auth()->user()->is_admin) {
            return redirect('/cours');
        }

        if ($role === 'is_prof' && !auth()->user()->is_prof) {
            return redirect('/cours');
        }
        if ($role === 'is_etudiant' && auth()->user()->is_etudiant) {
            return redirect('/cours');
        }

        return $next($request);
    }
}
