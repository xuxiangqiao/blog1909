<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login(){
    	return view('login');
    }

  //   public function logindo(){

  //   	$post = request()->except('_token');

    	
		// $adminuser = Admin::where('admin_name',$post['admin_name'])->first();
		// //如果解密后的密码和form表单传递的密码不一致返回到登录页面并提示
		// if(decrypt($adminuser->password)!=$post['password']){
		// 	return redirect('/login')->with('msg','用户名或者密码错误！');
		// }
		
		// //走七天免登陆 把用户信息存入cookie
		// if(isset($post['rember'])){
		// 	Cookie::queue('adminuser', $adminuser, 7*24*60);
  //   	}
		// session(['adminuser'=>$adminuser]);
		// return redirect('/brand/index');
  //   }


    public function logindo(){

    	$post = request()->except('_token');

    	if (Auth::attempt(['email' => $post['admin_name'], 'password' => $post['password']])) {
    		echo "登陆";
			// 认证通过...
			return redirect('/brand/index');
			//return redirect()->intended('dashboard');
		}
		
    }


}
