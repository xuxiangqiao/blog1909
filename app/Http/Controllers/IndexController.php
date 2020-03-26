<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function  index(){
    	echo "我是首页";
    }



    public function  goods(){
    	echo "我是商品";
    }


    public function add(){
    	//dump(request()->isMethod('get'));
    	if(request()->isMethod('get')){
    		return view('add');
    	}
    	if(request()->isMethod('post')){
    		echo request()->name;
    	}	
    }
	public function adddo(){
    	echo request()->name;

    	return redirect('/goods');
    }


    public function show($goods_id,$name){
    	echo $goods_id.'---'.$name;
    }

     public function news($goods_id=null){
     	echo "新闻详情页";
    	echo $goods_id;
    }

    public function cate($goods_id,$name){
     	echo "分类页";
    	echo $goods_id.'=='.$name;
    }

}
