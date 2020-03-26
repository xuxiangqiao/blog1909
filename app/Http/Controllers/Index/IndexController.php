<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
class IndexController extends Controller
{
    public function index(){
    	//先去缓存读取数据
    	//Cache::flush();
    	//Redis::flushall();
    	//$goods = Cache::get('is_slide');
    	//$goods = cache('is_slide');
    	$goods =Redis::get('is_slide');
    	//dump($goods);
    	if(!$goods){
    		//echo "DB=====";
    		//如果缓存没有则读取数据库
	    	$goods = Goods::getSlideData();
	    	//dd($goods);
	    	//存入memcache
	    	//Cache::put('is_slide',$goods,60*60*24);
	    	//cache(['is_slide'=>$goods],60*60*24);
            $goods = serialize($goods);
	    	Redis::setex('is_slide',60*60*24,$goods);
		}
		$goods = unserialize($goods);
    	return view('index.index',['goods'=>$goods]);
    }
}
