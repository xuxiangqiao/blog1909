@extends('layouts.shop')
@section('title', '注册页面')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="login.html" method="get" class="reg-login">
      <h3>已经有账号了？点此<a class="orange" href="{{url('/log')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" name="name" placeholder="输入手机号码或者邮箱号" /></div>
       <div class="lrList2"><input type="text" name="code" placeholder="输入短信验证码" /> <button type="button">获取验证码</button></div>
       <div class="lrList"><input type="text" name="password" placeholder="设置新密码（6-18位数字或字母）" /></div>
       <div class="lrList"><input type="text" name="repassword" placeholder="再次输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form>
       @include('index.public.footer');

       <script>
  $('button').click(function(){
       var name = $('input[name="name"]').val();
       var mobilereg=/^1[3|5|6|7|8|9]\d{9}$/;
       if(mobilereg.test(name)){
           //发生手机验证码
           $.get('/reg/sendSMS',{name:name},function(result){
              if(result.code=='00001'){
                alert(result.msg);
              }
              if(result.code=='00000'){
                alert(result.msg);
              }

           },'json');
           return;
       }
       var emailreg=/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
       if(emailreg.test(name)){

           //发生邮箱验证码
           $.get('/reg/sendEmail',{name:name},function(result){
              alert(result);
              // if(result.code=='00001'){
              //   alert(result.msg);
              // }
              // if(result.code=='00000'){
              //   alert(result.msg);
              //}

           },'json');
           return;
       }



       alert('请输入正确的手机号或者邮箱');
       return;
  });
  </script>

@endsection
    
