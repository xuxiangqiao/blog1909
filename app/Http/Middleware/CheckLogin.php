<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        
        $adminuser = $request->session()->get('adminuser');

        //dump($adminuser);
        if( !$adminuser ){
            //七天免登陆
            //判断cookie内是否有用户登陆信息 有则获取cookie的值 然后把cookie的值存入session
            $adminuser= $request->cookie('adminuser');
            if($adminuser){
                session(['adminuser'=>$adminuser]);
                $request->session()->save();
               // dump(session('adminuser'));
             }else{
                //echo "未登录";die;
                return redirect('/login');
            }
        }

        return $next($request);
    }
}
