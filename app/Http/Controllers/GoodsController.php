<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\Goods;
use DB;
use App\Http\Requests\StoreGoodsPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // //$user = Auth::user();
        // $userid = Auth::id();
        // //$user = request()->user();
        // dd($user);
        //Auth::logout();
        //dd(Auth::check());

        //Redis::flushall();

        $page = request()->page??1;
        $goods_name = request()->goods_name??'';

        $goods = Redis::get('goodslist_'.$page.'_'.$goods_name);
        //dump('goodslist_'.$page.'_'.$goods_name);
       // dd($goods);
        if(!$goods){
            //echo "DB ====="; 
            $where = [];
            if($goods_name){
                $where[] = ['goods_name','like',"%$goods_name%"];
            }
           
            $pageSize = config('app.pageSize');
            $goods = Goods::select('goods.*','brand.brand_name','category.cate_name')
                        ->leftjoin('category','goods.cate_id','=','category.cate_id')
                        ->leftjoin('brand','goods.brand_id','=','brand.brand_id')
                        ->where($where)
                        ->paginate($pageSize);

            $goods = serialize($goods);
            Redis::setex('goodslist_'.$page.'_'.$goods_name,5*60,$goods);            
        } 
        $goods = unserialize($goods);      
        return view('goods.index',['goods'=>$goods,'goods_name'=>$goods_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //品牌
        $brand = Brand::all();
       // dd($brand);
        //分类
        $cate = Category::all();
        //无限极分类
        $cate = CreateTree($cate);
       // dd($cate);
        return view('goods.create',['brand'=>$brand,'cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(StoreGoodsPost $request)
    {
        // $request->validate([
        //         'goods_name' => 'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u|unique:goods',
        //         'cate_id'=>'required',
        //         'brand_id'=>'required',
        //         'goods_price'=>'required|numeric',
        //         'goods_number'=>'required|numeric|between:1,9999999',
                
        //  ],[
        //     'goods_name.regex'=>'商品名称可以包含中文、数字、字母、下划线长度范围为2-50位',
        //     'goods_name.unique'=>'商品名称已存在！',
        //     'cate_id.required'=>'请选择商品分类！',
        //     'brand_id.required'=>'请选择商品品牌！',
        //     'goods_price.required'=>'商品价格必填！',
        //     'goods_price.numeric'=>'商品价格必须是数字',
        //     'goods_number.required'=>'商品库存必填！',
        //     'goods_number.numeric'=>'商品库存必须是数字',
        //     'goods_number.between'=>'商品库存不超过8位',

        //  ]);

        $post = $request->except('_token');
       // dd($post);

        if($request->hasFile('goods_img')){
            $post['goods_img'] = upload('goods_img');
        }
        if($request->hasFile('goods_imgs')){
            $post['goods_imgs'] = Moreupload('goods_imgs');
            $post['goods_imgs']  = implode('|', $post['goods_imgs']);
        }

        $res = Goods::create($post);
        if( $res ){
            return redirect('goods/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //品牌
        $brand = Brand::all();
       // dd($brand);
        //分类
        $cate = Category::all();
        //无限极分类
        $cate = CreateTree($cate);

        $goods = Goods::find($id);
        return view('goods.edit',['goods'=>$goods,'brand'=>$brand,'cate'=>$cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGoodsPost $request, $id)
    {

        // $request->validate([
        //         //'goods_name' => 'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u|unique:goods',
        //         'goods_name' => [
        //             'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u',
        //             Rule::unique('goods')->ignore($id,'goods_id'),
        //         ],
        //         'cate_id'=>'required',
        //         'brand_id'=>'required',
        //         'goods_price'=>'required|numeric',
        //         'goods_number'=>'required|numeric|between:1,9999999',
                
        //  ],[
        //     'goods_name.regex'=>'商品名称可以包含中文、数字、字母、下划线长度范围为2-50位',
        //     'goods_name.unique'=>'商品名称已存在！',
        //     'cate_id.required'=>'请选择商品分类！',
        //     'brand_id.required'=>'请选择商品品牌！',
        //     'goods_price.required'=>'商品价格必填！',
        //     'goods_price.numeric'=>'商品价格必须是数字',
        //     'goods_number.required'=>'商品库存必填！',
        //     'goods_number.numeric'=>'商品库存必须是数字',
        //     'goods_number.between'=>'商品库存不超过8位',

        //  ]);

        $post = $request->except('_token');
       // dd($post);

        if($request->hasFile('goods_img')){
            $post['goods_img'] = upload('goods_img');
        }
        if($request->hasFile('goods_imgs')){
            $post['goods_imgs'] = Moreupload('goods_imgs');
            $post['goods_imgs']  = implode('|', $post['goods_imgs']);
        }

        $res = Goods::where('goods_id',$id)->update($post);
        if( $res!==false ){
            return redirect('goods/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
