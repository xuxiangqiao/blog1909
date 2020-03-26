<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品品牌添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>商品品牌编辑
<a style="float:right" href="{{url('/brand/index')}}" class="btn btn-default">列表</a>
</h2></center><hr/>
<form action="{{url('/brand/update/'.$brand->brand_id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" id="firstname" name="brand_name" value="{{$brand->brand_name}}" placeholder="请输入品牌名称">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌网址</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" id="firstname"  name="brand_url" value="{{$brand->brand_url}}" placeholder="请输入品牌网址">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌LOGO</label>
		@if($brand->brand_logo)<img src="{{env('UPLOADS_URL')}}{{$brand->brand_logo}}" with="35" height="35">@endif
		<div class="col-sm-3">

			<input type="file" class="form-control" id="firstname" name="brand_logo">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌描述</label>
		<div class="col-sm-9">
			<textarea type="text" class="form-control" id="firstname" name="brand_desc"
				   placeholder="请输入品牌描述">{{$brand->brand_desc}}</textarea>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

</body>
</html>