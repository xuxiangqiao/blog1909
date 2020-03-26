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
<center><H1>商品编辑页面</H1></center>

<form  action="{{url('/goods/update/'.$goods->goods_id)}}" method='post' class="form-horizontal" role="form" enctype='multipart/form-data'>
@csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">商品名称</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" value="{{$goods->goods_name}}" name='goods_name' id="firstname">
                   <b style='color:red'>{{$errors->first('goods_name')}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">商品货号</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" value="{{$goods->goods_sn}}" name='goods_sn' id="firstname">
                   
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品分类</label>
        <div class="col-sm-8">
            <select name="cate_id" id="" class="form-control" >             
            <option value="0">--请选择--</option>
            @foreach($cate as $v)
            <option value="{{$v->cate_id}}" @if($goods->cate_id==$v->cate_id) selected @endif>{{str_repeat('|——',$v->level)}}{{$v->cate_name}}</option>
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
            <option value="{{$v->brand_id}}" @if($goods->brand_id==$v->brand_id) selected @endif>{{$v->brand_name}}</option>
            @endforeach 
            </select>  
            <b style='color:red'>{{$errors->first('brand_id')}}</b>
        </div>
    </div>
     
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">商品价格</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" value="{{$goods->goods_price}}" name='goods_price' id="firstname">
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
            <input type="text" class="form-control" value="{{$goods->goods_number}}" name='goods_number' id="firstname">
                   <b style='color:red'>{{$errors->first('goods_number')}}</b>
        </div>
    </div>

    
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">是否精品</label>
        <div class="col-sm-8">
            <input type="radio"  name='is_fine' value='1' @if($goods->is_fine==1) checked @endif>是
            <input type="radio"   name='is_fine' value='2' @if($goods->is_fine==2) checked @endif>否
                   
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">是否热销</label>
        <div class="col-sm-8">
        <input type="radio"  name='is_hot' value='1' @if($goods->is_hot==1) checked @endif>是
            <input type="radio"   name='is_hot' value='2' @if($goods->is_hot==1) checked @endif>否
             
                    
        </div>
    </div>
    
     <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">商品描述</label>
        <div class="col-sm-8">
             <textarea name="goods_desc" id="" cols="145" rows="5">{{$goods->desc}}</textarea>    
            
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
            <input type="submit" value='修改'>
        </div>
    </div>
</form>

</body>
</html>