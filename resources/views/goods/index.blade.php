<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>商品管理</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token()}}">
</head>
<body>

<center><H1>商品管理列表</H1></center>
<a style="float:right" href="{{url('/goods/create')}}" class="btn btn-default">添加</a>
<form>
   <input  name="goods_name" value="{{$goods_name}}" placeholder="输入关键字"  >
    <button>搜索</button>
</form>    
<table class="table">
 
  <thead>
    <tr>
      <th>ID</th>
      <th>商品名称</th>
      <th>商品分类</th>
      <th>商品品牌</th>
      <th>商品缩略图</th>
      <th>是否精品</th>
      <th>是否热销</th>
      
      
      <th>操作</th>
      </tr>
  </thead>
  <tbody>
    @foreach($goods as $v)
    <tr>
      <td>{{$v->goods_id}}</td>
      <td>{{$v->goods_name}}</td>
      <td>{{$v->cate_name}}</td> 
      <td>{{$v->brand_name}}</td>
      <td><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" with="35" height="35"></td> 
      <td>{{$v->is_fine?'√':'×'}}</td>
      <td>{{$v->is_hot?'√':'×'}}</td>

      <td> 
      <a href="{{url('/goods/'.$v->goods_id)}}" class="btn btn-success">预览</a>| <a href="{{url('/goods/edit/'.$v->goods_id)}}" class="btn btn-success">编辑</a>|
        <a href="javascript:void(0)" class="btn btn-danger del">删除</a>
      </td> 
    </tr>
  @endforeach  
     <tr><td colspan='10'>{{$goods->appends(['goods_name'=>$goods_name])->links()}}</td></tr>
  </tbody>
</table>
        
</body>

</html>
