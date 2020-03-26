<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>商品管理</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><H1>商品添加页面</H1></center>
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>@endforeach
</ul>
</div>
@endif

<form  action="{{url('/goods/store')}}" method='post' class="form-horizontal" role="form" enctype='multipart/form-data'>
@csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">商品名称</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name='goods_name' id="firstname">
                   <b style='color:red'>{{$errors->first('goods_name')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">商品货号</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name='goods_sn' id="firstname">
                   
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品分类</label>
        <div class="col-sm-8">
            <select name="cate_id" id="" class="form-control" >             
            <option value="0">--请选择--</option>
            @foreach($cate as $v)
            <option value="{{$v->cate_id}}">{{str_repeat('|——',$v->level)}}{{$v->cate_name}}</option>
            @endforeach
            </select>  
            <b style='color:red'>{{$errors->first('cate_id')}}</b>
        </div>
    </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">商品品牌</label>
        <div class="col-sm-8">
        <select name="brand_id" id="" class="form-control">          
            <option value="0">--请选择--</option>
             @foreach($brand as $v)
            <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
            @endforeach 
            </select>  
            <b style='color:red'>{{$errors->first('brand_id')}}</b>
        </div>
    </div>
     
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">商品价格</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name='goods_price' id="firstname">
                   <b style='color:red'>{{$errors->first('goods_price')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">商品缩略图</label>
        <div class="col-sm-8">
            <input type="file" class="form-control" name='goods_img' id="firstname">
                  
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">商品库存</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name='goods_number' id="firstname">
                   <b style='color:red'>{{$errors->first('goods_number')}}</b>
        </div>
    </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">是否首页幻灯片推荐</label>
        <div class="col-sm-8">
            <input type="radio"  name='is_slide' value='1' >是
            <input type="radio"   name='is_slide' value='2' checked>否
                   
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">是否精品</label>
        <div class="col-sm-8">
            <input type="radio"  name='is_fine' value='1' checked>是
            <input type="radio"   name='is_fine' value='2' >否
                   
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">是否热销</label>
        <div class="col-sm-8">
        <input type="radio"  name='is_hot' value='1' checked>是
            <input type="radio"   name='is_hot' value='2' >否
             
                    
        </div>
    </div>
    
     <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">商品描述</label>
        <div class="col-sm-8">
             <textarea name="goods_desc" id="" cols="145" rows="5"></textarea>    
            
        </div>
    </div>   
 
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">商品相册</label>
        <div class="col-sm-8">
        <input type="file" name="goods_imgs[]" multiple='multiple'  class="form-control" />
              
        </div>
    </div>   

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
            <input type="submit" value='添加'>
        </div>
    </div>
</form>

</body>
</html>