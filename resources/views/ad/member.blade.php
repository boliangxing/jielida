@extends('ad.master')
@section('content')

<div class="pd-20">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" id="" name="">
		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">员工列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value="0" class="input_check_all"></th>
				<th width="40">ID</th>
				<th width="150">昵称</th>
				<th width="90">手机</th>
				<th width="150">邮箱</th>
 				<th width="130">注册时间</th>
				<th width="130">最后登录时间</th>
				<th width="130">登录次数</th>
				<th width="130">IP</th>

				<th width="100">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>

			@foreach($users as $user)
			<tr class="text-c">
					<td><input type="checkbox" value="0" class="input_check"name="add_type" uid="{{$user->uid}}" ></td>
				<td>{{$user->uid}}</td>
				<td>{{$user->nick}}</td>
				<td>{{$user->phone}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->regtime}}</td>
				<td>{{$user->login_time}}</td>
				<td>{{$user->login_hit}}</td>
				<td>{{$user->login_ip}}</td>

				<td class="td-status"><span class="label label-success radius">
@if($user->status>=0)
已启用
@else if($user->status<=0)
未启用
@endif
				</span></td>

				<td class="td-manage">
					<a title="编辑" href="javascript:;" onclick="" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
						<a title="删除" href="javascript:;" onclick="member_del('{{$user->phone}}','{{$user->uid}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
@section('my-js')
<script type="text/javascript">
function datadel(){
	var  box = $("input[name=add_type]");
          length =box.length;
       //alert(length);
       var str ="";
      for(var i=0;i<length;i++){
           if(box[i].val=="1"){
                str =str+","+box[i].uid();
           }

       }       str= str.substr(1);

layer.confirm('确认要删除吗？',function(index){


		$.ajax({
 	type:'get',
	url: '/ad/service/member/uid/'+str,

 			dataType:'json',
			 cache: false,
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

function member_del(phone,uid){
layer.confirm('确认要删除【'+phone+'】吗？',function(index){


		$.ajax({
		type:'post',
		url:'/ad/service/member/del',
		dataType:'json',
		data:{
			uid:uid,
	  phone:phone,
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

$(".input_check").change(function(){
   if($(this).val()=="0"){
           $(this).val(1);
   }else {
           $(this).val(0);
   }

})
$(".input_check_all").change(function(){
   if($(this).val()=="0"){
           $(".input_check").val(1);
					 $(".input_check_all").val(1);

   }else {
		 $(".input_check").val(0);
		 $(".input_check_all").val(0);
   }

})
</script>
@endsection
