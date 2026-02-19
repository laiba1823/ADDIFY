<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!(session()->has("LoggedAdmin"))) {
            return redirect(route("admin.loginForm"))->with("fail", "Login first of all");
        }

        // Passing down users data for the template
        $id = session("LoggedAdmin");
        $request->admin = Admin::where("id", "=", $id)->first();
        
        return $next($request);
    }
}
