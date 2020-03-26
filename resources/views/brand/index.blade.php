<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>品牌列表</title>
	<link rel="stylesheet" href="{{asset('/static/admin/css/bootstrap.min.css')}}">  
	<script src="/static/admin/js/jquery.min.js"></script>
	<script src="/static/admin/js/bootstrap.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<center><h2>商品品牌列表
<a style="float:right" href="{{url('/brand/create')}}" class="btn btn-default">添加</a>
</h2></center><hr/>
<div class="table-responsive">
<form>
<input type="text" name="name" placeholder="请输入品牌关键字" value="{{$query['name']??''}}">
<input type="text" name="url" placeholder="请输入网址关键字" value="{{$query['url']??''}}">
<button>搜索</button>
</form>
	<table class="table">
		
		<thead>
			<tr>
				<th>品牌ID</th>
				<th>品牌名称</th>
				<th>品牌网址</th>
				<th>品牌LOGO</th>
				<th>品牌相册</th>
				<th>品牌描述</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>

		@foreach ($brand as $v)
			<tr>
				<td>{{$v->brand_id}}</td>
				<td>{{$v->brand_name}}</td>
				<td>{{$v->brand_url}}</td>
				<td>@if($v->brand_logo)<img src="{{env('UPLOADS_URL')}}{{$v->brand_logo}}" with="35" height="35">@endif</td>
				<td>
				@if($v->brand_imgs)
				@php $brand_imgs= explode('|',$v->brand_imgs);  @endphp
				@foreach ($brand_imgs as $vv)
				<img src="{{env('UPLOADS_URL')}}{{$vv}}" with="35" height="35">
				@endforeach	
				@endif
				</td>
				<td>{{$v->brand_desc}}</td>
				<td>
				<a href="{{url('/brand/edit/'.$v->brand_id)}}"  class="btn btn-primary">编辑</a>|
				<a href="javascript:void(0)" id="{{$v->brand_id}}" class="btn btn-danger">删除</a>
				</td>
			</tr>
		@endforeach	

			<tr><td colspan="6">{{$brand->appends($query)->links()}}</td></tr>
		</tbody>
</table>
</div>  	

<script>
//ajax 删除
$('.btn-danger').click(function(){
	var id = $(this).attr('id');
	if(confirm('确认要删除当前记录吗？')){
		//get ajax删除
		// $.get('/brand/destroy/'+id,function(result){
		// 	if(result.code=='00000'){
		// 		location.reload();
		// 	}
		// },'json');

		//post ajax删除
		$.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
		$.post('/brand/destroy/'+id,function(result){
			if(result.code=='00000'){
				location.reload();
			}
		},'json');
	}
});



//无刷新分页
$(document).on('click','.pagination a',function(){
//$('.pagination a').click(function(){
	var url = $(this).attr('href');
	$.get(url,function(result){
		$('tbody').html(result);
	});

	return false;
});
</script>


</body>
</html>