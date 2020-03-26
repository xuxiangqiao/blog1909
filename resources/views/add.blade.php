
<h1>控制器</h1><hr/>
<form action="{{url('/adddo')}}" method="post">
{{csrf_field()}}
<!-- @csrf
<input type="hidden" name="_token" value="{{csrf_token()}}"> -->
 <input type="text" name="name" >
 <button>提交</button>
 </form>