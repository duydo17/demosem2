<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckShipperLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = session()->get('role');
        if($role == "shipper"|| $role == "admin"){
            return $next($request);
        }
        return redirect()->route('home')->with('error','Bạn Chưa Đăng Nhập Tài Khoản');
    }
}
