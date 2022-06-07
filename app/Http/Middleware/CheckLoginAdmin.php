<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //echo 'Middleware Request';
        if ($this->isLogin()){
            return redirect(route('home'));
        }
        if($request->is('admin/*')|| $request->is('admin')){
            echo '<h3>Khu vực quản trị</h3>';
        }
        return $next($request);//cho phép request đi tiếp tới controller
    }

    public function isLogin(){
        return false;
    }
}
