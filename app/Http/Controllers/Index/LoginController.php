<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//短信验证码
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
//邮箱
use App\Mail\SendCode;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use App\Member;
class LoginController extends Controller
{
    public function log(){
    	return view('index.login');
    }

    public function reg(){
    	return view('index.reg');
    }

    public function sendSMS(){

    	$name = request()->name;
    	//php 验证手机号

    	$reg = '/^1[3|5|6|7|8|9]\d{9}$/';
    	if(!preg_match($reg, $name)){
    		return json_encode(['code'=>'00001','msg'=>'请输入正确的手机号或者邮箱']);
    	}

    	$code = rand(100000,999999);

    	$result = $this->send($name,$code);
    	//发送成功！
    	if($result['Message']=='OK'){

    		session(['code'=>$code]);
    		return json_encode(['code'=>'00000','msg'=>'发送成功！']);
    	}
    	//发送失败
    	return json_encode(['code'=>'00000','msg'=>$result['Message']]);
    }

    //发送短信验证码
    public function send($name,$code){
		// Download：https://github.com/aliyun/openapi-sdk-php
		// Usage：https://github.com/aliyun/openapi-sdk-php/blob/master/README.md
		AlibabaCloud::accessKeyClient('LTAI4Feys3XfGUZfqzcu1kg4', 'Rp6ChiyL6fw666LjAeE4zYaEfC6bk8')
		                        ->regionId('cn-hangzhou')
		                        ->asDefaultClient();

		try {
		    $result = AlibabaCloud::rpc()
		                          ->product('Dysmsapi')
		                          // ->scheme('https') // https | http
		                          ->version('2017-05-25')
		                          ->action('SendSms')
		                          ->method('POST')
		                          ->host('dysmsapi.aliyuncs.com')
		                          ->options([
		                                        'query' => [
		                                          'RegionId' => "cn-hangzhou",
		                                          'PhoneNumbers' => $name,
		                                          'SignName' => "一品学堂",
		                                          'TemplateCode' => "SMS_184105081",
		                                          'TemplateParam' => "{code:$code}",
		                                        ],
		                                    ])
		                          ->request();
		    return $result->toArray();
		} catch (ClientException $e) {
		    return $e->getErrorMessage() . PHP_EOL;
		} catch (ServerException $e) {
		    return $e->getErrorMessage() . PHP_EOL;
		}

    }

    public function sendEmail(){
    	$name = request()->name;
    	//php 验证邮箱
    	$reg = '/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/';
    	if(!preg_match($reg, $name)){
    		return json_encode(['code'=>'00001','msg'=>'请输入正确的手机号或者邮箱']);
    	}
    	//生成随机验证码
    	$code = rand(100000,999999);
    	//发送邮件
    	Mail::to($name)->send(new SendCode($code));
    	//发送成功存入session
    	session(['code'=>$code]);

    	return json_encode(['code'=>'00000','msg'=>'发送成功！']);
    }

    public function addcookie(){
    	//return response('hello 1909!')->cookie('name','zhangsan',1);
    	Cookie::queue(Cookie::make('num', 'lisi',1));
    	//Cookie::queue('age', '10', 1);

    }
    public function getcookie(){
    	echo request()->cookie('age');
    }


    public function dologin(){
        $post = request()->all();

        $user = Member::where('username',$post['username'])->first();
        //如果解密后的密码和form表单传递的密码不一致返回到登录页面并提示
        if(decrypt($user->pwd)!=$post['pwd']){
            return redirect('/log')->with('msg','用户名或者密码错误！');
        }

        session(['user'=>$user]);
        //判断来源
        if($post['refer']){
            return redirect($post['refer']);
        }
        return redirect('/');

    }

}
