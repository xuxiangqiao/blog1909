<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //指定表名
    protected $table = 'goods';
    protected $primaryKey = 'goods_id';
    public $timestamps = false;

    //黑名单
    protected $guarded = [];

    //获取首页幻灯片数据
    public static function getSlideData(){
    	$goods  = Goods::select('goods_id','goods_img')->where('is_slide',1)->orderBy('goods_id','desc')->take(5)->get();

    	return $goods;
    }


}
