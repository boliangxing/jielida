@extends('ad.master')
@section('content')

	<div class="cl pd-5 bg-1 bk-gray mt-20">
		 <a href="javascript:;" onclick="agency_add('添加类别','/ad/agency_add','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加商户</a></span>

	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="80">ID</th>
				<th width="100">商户名</th>
				<th width="40">电话</th>
				<th width="90">国家</th>
				<th width="50">省/洲</th>

				<th width="100">城市</th>
						<th width="100">街道地址</th>

						<th width="100">邮箱</th>
						<th width="100">商户等级</th>

			</tr>
		</thead>
		<tbody>

			@foreach($agencys as $agency)
			<tr class="text-c">
				<td>{{$agency->id}}</td>
				<td>{{$agency->name}}</td>
				<td>{{$agency->phone}}</td>
				<td>{{$agency->country}}</td>

				<td>{{$agency->province}}</td>
				<td>{{$agency->city}}</td>
				<td>{{$agency->address}}</td>
				<td>{{$agency->email}}</td>
				<td>
				   @if($agency->lv==0)
					 普通商户
					 @elseif($agency->lv==1)
					 铜牌商户
					 @elseif($agency->lv==2)
					银牌商户
					@elseif($agency->lv==3)
				 金牌商户
				@endif
				 </td>
				<td class="td-manage">
 						<a title="删除" href="javascript:;" id="category_del"onclick="agency_del('{{$agency->name}}','{{$agency->id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>

				 	</tr>
@endforeach
		</tbody>
	</table>
	</div>
</div>
@endsection


@section('my-js')
<script type="text/javascript">

	function agency_add(title,url){
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
function agency_del(name,id){
layer.confirm('确认要删除【'+name+'】吗？',function(index){

		$.ajax({
		type:'post',
		url:'/ad/service/agency/del',
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
