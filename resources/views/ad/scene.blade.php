@extends('ad.master')
@section('content')

	<div class="cl pd-5 bg-1 bk-gray mt-20">
		 <a href="javascript:;" onclick="scene_add('添加场景','/ad/scene_add','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加类别</a></span>
 	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="80">场景ID</th>
				<th width="100">场景类别</th>


				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>

			@foreach($scenes as $scene)
			<tr class="text-c">
				<td>{{$scene->sid}}</td>
				<td>{{$scene->scname}}</td>


				<td class="td-manage">
					<a title="编辑" href="javascript:;" onclick="scene_edit('编辑类别','/ad/scene_edit?id={{$scene->sid}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
					  <a title="删除" href="javascript:;" id="scene_del"onclick="scene_del('{{$scene->scname}}','{{$scene->sid}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
@endforeach
		</tbody>
	</table>
	</div>
</div>
@endsection


@section('my-js')
<script type="text/javascript">

	function scene_add(title,url){
		var index = layer.open({
			type: 2,
			title: title,
			content: url
		});
		layer.full(index);


}
function scene_edit(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);


}
function scene_del(name,id){
layer.confirm('确认要删除【'+name+'】吗？',function(index){

		$.ajax({
		type:'post',
		url:'/ad/service/scene/del',
		dataType:'json',
		data:{
	  id:id,
		_token:"{{csrf_token()}}"


		},
		success:function(data){

		if(data==null){
		layer.msg('服务器端错误',{icon:2,time:2000});
		return;

		}
		if(data.status!=0){
		layer.msg(data.message,{icon:2,time:2000});
		return;

		}
		layer.msg(data.message,{icon:1,time:2000});
		location.replace(location.href);
		},
		error:function(xhr,status,error){

		console.log(xhr);
		console.log(status);
		console.log(error);
		layer.msg('ajax error',{icon:2,time:2000});


		},beforeSend:function(xhr){

		layer.load(0,{shade:false});

		},

		});

		return false;



	});


}


</script>
@endsection
