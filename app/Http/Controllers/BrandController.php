<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use DB;
use App\Brand;
use App\Http\Requests\StoreBrandPost;
use Validator;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      // dd(encrypt(123456));
        // //存储session
        //  session(['name'=>'zhangsan']);
        //  request()->session()->put('number',100);
        //  //request()->session()->save();

        // //删除
        //  session(['name'=>null]);
        //  request()->session()->forget('number');
        // //删除所有
        //  request()->session()->flush();

        // //获取session
        //  echo session('name');
        //  echo request()->session()->get('number');
        // //获取所有
        // dump(request()->session()->all());

        $name = request()->name;
        $where=[];
        if($name){
           $where[] = ['brand_name','like',"%$name%"]; 
        }
        $url = request()->url;
        if($url){
           $where[] = ['brand_url','like',"%$url%"]; 
        }
        $pageSize = config('app.pageSize');
        //$brand = DB::table('brand')->get();
        //ORM
        //$brand = Brand::all();
        $brand = Brand::where($where)->orderby('brand_id','desc')->paginate($pageSize);
       // dd($brand);
        $query = request()->all();

        //ajax分页
        if(request()->ajax()){
            return view('brand.ajaxpage',['brand'=>$brand,'query'=>$query]);
        }

        return view('brand.index',['brand'=>$brand,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     * 添加界面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    //第二种验证
    public function store(StoreBrandPost $request)
    {
        //第一种验证
        // $validatedData = $request->validate([
        //     'brand_name' => 'required|unique:brand|max:20',
        //     'brand_url' => 'required', 
        // ],[
        //     'brand_name.required'=>'品牌名称必填！',
        //     'brand_name.unique'=>'品牌名称已存在！',
        //     'brand_name.max'=>'品牌名称最大长度不超过20位！',
        //     'brand_url.required'=>'品牌网址必填！',
        // ]);

        $post = $request->except('_token');
        //dump($post);
        //第三种验证
        // $validator = Validator::make($post, [
        //     'brand_name' => 'required|unique:brand|max:20',
        //     'brand_url' => 'required',
        // ],[
        //     'brand_name.required'=>'品牌名称必填！',
        //     'brand_name.unique'=>'品牌名称已存在！',
        //     'brand_name.max'=>'品牌名称最大长度不超过20位！',
        //     'brand_url.required'=>'品牌网址必填！',
        // ]);
        // if ($validator->fails()) {
        //     return redirect('brand/create')
        //                         ->withErrors($validator)
        //                         ->withInput();
        // }


        //文件上传
        if ($request->hasFile('brand_logo')) { 
            $post['brand_logo'] = upload('brand_logo');
        }
        //多文件上传
        if ($request->hasFile('brand_imgs')) { 
            $brand_imgs = Moreupload('brand_imgs');
            $post['brand_imgs'] = implode('|', $brand_imgs);
        }
        //dd($post);
        //$res = DB::table('brand')->insert($post);
        //ORM添加 第一种
        // $brand = new Brand;
        // $brand->brand_name = $request->brand_name;
        // $brand->brand_url = $request->brand_url;
        // $brand->brand_logo = $request->brand_logo;
        // $brand->brand_desc = $request->brand_desc;
        // $res = $brand->save();
        //ORM添加 第二种
        //$res = Brand::create($post);
        //ORM添加 第三种
        $res = Brand::insert($post);

//dd($res);
        if( $res ){
            return redirect('/brand/index');
        }

    }

    /**
     * Display the specified resource.
     * 详情页展示（预览）
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *展示编辑页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //跟据id获取单条记录
        //$brand = DB::table('brand')->where('brand_id',$id)->first();

        //ORM
        //$brand = Brand::find($id);
        $brand = Brand::where('brand_id',$id)->first();

        return view('brand.edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *执行编辑
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        //排除接收谁
        $post = $request->except(['_token']);

        //文件上传
        if ($request->hasFile('brand_logo')) { 
            $post['brand_logo'] = $this->upload('brand_logo');
        }
        //只接收谁
       // $post = $request->only(['_token','brand_logo']);
        //dd($post);
        //接收所有值
        //$post = $request->all();
        //$post = request()->input();
        //接收单个值
        //$post = $request->get('brand_name');
        //$post = $request->post('brand_name');
        //$post = $request->brand_name;
        //$post = $request->get('brand_name');
        //dd($post);
        //$res = DB::table('brand')->where('brand_id', $id)->update($post);

        //ORM 第一种save
        // $brand = Brand::find($id);
        // $brand->brand_name = $request->brand_name;
        // $brand->brand_url = $request->brand_url;
        // $brand->brand_logo = $request->brand_logo;
        // $brand->brand_desc = $request->brand_desc;
        // $res = $brand->save();

        $res = Brand::where('brand_id', $id)->update($post);

        if( $res!==false ){
            return redirect('/brand/index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$res = DB::table('brand')->where('brand_id',$id)->delete();

        //ORM
        $res = Brand::destroy($id);
        if( $res ){
            if(request()->ajax()){
                return json_encode(['code'=>'00000','msg'=>'删除成功！']);
            }
            return redirect('/brand/index');
        }
    }

    //检查品牌名称的唯一性验证
    public function checkOnly(){

        $brand_name = request()->brand_name;
        $count = Brand::where('brand_name',$brand_name)->count();

        return json_encode(['code'=>'00000','count'=>$count]);
    }
}