<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $role = Auth::user()->role;
        if ($role == 'admin') {
            return $next($request);
        } else {
            return redirect()->route('user.show', ['id' => Auth::id()]);
        }
    }
}
