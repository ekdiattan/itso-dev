<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $moduleName
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $moduleName)
    {
        $user = Auth::user();

        if (!hasPermission($user->role->MasterRoleId, $moduleName)) {
            return redirect()->back();
        }
        
        return $next($request);
    }
}
