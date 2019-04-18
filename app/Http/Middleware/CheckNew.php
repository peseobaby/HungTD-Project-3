<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckNew
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
        $new = Auth::user()->new;
        if($new == true) {
            return $next($request);
        } else {
            return redirect()->route('user.edit', ['id' => Auth::id()]);
        }

    }
}
