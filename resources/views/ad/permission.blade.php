@extends('ad.master')
@section('content')

	<div class="cl pd-5 bg-1 bk-gray mt-20">
		 <a href="javascript:;" onclick="permission_add('添加类别','/ad/permission_add','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span>

	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="80">ID</th>
				<th width="100">管理员帐号</th>
		 		<th width="100">管理员权限(1为所有权限 2为部分权限 3为无权限)</th>
			</tr>
		</thead>
		<tbody>

			@foreach($permissions as $permission)
			<tr class="text-c">
				<td>{{$permission->id}}</td>
				<td>{{$permission->num}}</td>
				<td>{{$permission->qx}}</td>


				 	</tr>
@endforeach
		</tbody>
	</table>
	</div>
</div>
@endsection


@section('my-js')
<script type="text/javascript">

	function permission_add(title,url){
		var index = layer.open({
			type: 2,
			title: title,
			content: url
		});
		layer.full(index);


}
function agency_edit(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);


}
function permission_del(name,id){
layer.confirm('确认要删除【'+name+'】吗？',function(index){

		$.ajax({
		type:'post',
		url:'/ad/service/permission/del',
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
