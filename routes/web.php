<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//闭包路由
// Route::get('/', function () {
// 	//echo 123;
//     return view('welcome');
// });
Route::get('/hello', function () {
	echo 'chinese';
   // return 'chinese';
});

Route::get('/index', 'IndexController@index');
Route::get('/goods', 'IndexController@goods');

// Route::get('/add', function(){
// 	echo '<form action="/adddo" method="post">'.csrf_field().' <input type="text" name="name" ><button>提交</button></form>';
// });
// Route::post('/adddo', function(){
// 	echo request()->name;
// });

Route::get('/add', 'IndexController@add');
Route::post('/adddo', 'IndexController@adddo');

//一个路由支持多种请求方式
//Route::match(['get','post'],'/add', 'IndexController@add');
//Route::any('/add', 'IndexController@add');


//路由视图
// Route::view('/add','add');
// Route::get('/add', 'IndexController@add');

//必填路由参数
// Route::get('/show/{id}/{name}',function($id,$goods_name){
// echo $id."==".$goods_name;
// });

Route::get('/show/{id}/{name}','IndexController@show');

//可选路由参数
// Route::get('/news/{id}/{name?}',function($id,$goods_name=null){
// echo $id."==".$goods_name;
// });
//Route::get('/news/{id?}', 'IndexController@news');

//正则约束
//Route::get('/news/{id?}', 'IndexController@news')->where('id','[0-9]+');
//Route::get('/news/{id?}', 'IndexController@news')->where('id','\d+');

Route::get('/cate/{id}/{name}', 'IndexController@cate')->where(['id'=>'\d+','name'=>'[a-zA-Z]+']);

//后台
Route::domain('admin.1909.com')->group(function (){
	//品牌模块的CURD
	//Route::prefix('brand')->middleware('islogin')->group(function(){
	Route::prefix('brand')->middleware('auth')->group(function(){	
		Route::get('create','BrandController@create');
		Route::post('store','BrandController@store');
		Route::get('index','BrandController@index');
		Route::get('edit/{id}','BrandController@edit');
		Route::post('update/{id}','BrandController@update');
		//Route::get('destroy/{id}','BrandController@destroy');
		Route::post('destroy/{id}','BrandController@destroy');
		Route::get('checkOnly','BrandController@checkOnly');
	});

	Route::prefix('goods')->middleware('auth.basic')->group(function(){
		Route::get('create','GoodsController@create');
		Route::post('store','GoodsController@store')->name('goodsstore');
		Route::get('index','GoodsController@index');
		Route::get('edit/{id}','GoodsController@edit');
		Route::post('update/{id}','GoodsController@update')->name('goodsupdate');
		Route::get('destroy/{id}','GoodsController@destroy');
	});
	Route::get('login','LoginController@login')->name('login');
	Route::post('logindo','LoginController@logindo');

});

//前台
Route::domain('www.1909.com')->group(function (){
	Route::get('/','Index\IndexController@index')->name('index');
	Route::get('/log','Index\LoginController@log');
	Route::post('/dolog','Index\LoginController@dologin');
	Route::get('/reg','Index\LoginController@reg');
	Route::get('/reg/sendSMS','Index\LoginController@sendSMS');
	Route::get('/reg/sendEmail','Index\LoginController@sendEmail');

	Route::get('/cookie/add','Index\LoginController@addcookie');
	Route::get('/cookie/get','Index\LoginController@getcookie');
	//商品详情
	Route::get('/goods/{id}','Index\GoodsController@index')->name('goods');
	Route::post('/addcart','Index\GoodsController@addcart');
	//购物车列表
	Route::get('/cart','Index\CartController@cart')->name('cart');

	// Auth::routes();
	// Route::get('/home', 'HomeController@index')->name('home');

	
	Route::get('/pay/{orderid}','Index\PayController@pay');
	Route::get('/return_url','Index\PayController@return_url');//同步跳转

	Route::post('/notify_url','Index\PayController@notify_url');//异步跳转

});