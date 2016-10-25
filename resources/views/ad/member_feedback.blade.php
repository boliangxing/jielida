@extends('ad.master')
@section('content')
 

<div class="pd-20">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" id="" name="">
		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 按用户名搜索反馈</button>
	</div>
 	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">反馈列表</th>
			</tr>
			<tr class="text-c">

				<th width="300">用户ID</th>
				<th width="300">反馈内容</th>
				<th width="300">提交时间</th>


				<th width="300">操作</th>
			</tr>
		</thead>
		<tbody>

			@foreach($feedbacks as $feedback)
			<tr class="text-c">

 				<td>{{$feedback->uid}}</td>
				<td>{{$feedback->content}}</td>
				<td>{{$feedback->time}}</td>



				<td class="td-manage">
 						<a title="删除" href="javascript:;" onclick="feed_del('{{$feedback->time}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		@endforeach

		</tbody>
	</table>
</div>
@section('my-js')
<script>

function feed_del(time){
layer.confirm('确认要删除吗？',function(index){


		$.ajax({
		type:'post',
		url:'/ad/service/feed/del',
		dataType:'json',
		data:{
		time:time,
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
