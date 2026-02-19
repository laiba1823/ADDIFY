<?php

namespace App\Http\Middleware;

use App\Models\Vendor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCheckVendor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!(session()->has("LoggedVendor"))) {
            return redirect(route("vendors.loginForm"))->with("fail", "Login first of all");
        }

        // Passing down users data for the template
        $id = session("LoggedVendor");
        $request->vendor = Vendor::where("id", "=", $id)->first();
        
        return $next($request);
    }
}
