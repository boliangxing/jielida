@extends('ad.master')
@section('content')
<div class="pd-20">

 <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
   <a href="javascript:;" onclick="release('发布新版本','/ad/cmds_edit/')" class="btn btn-primary radius"><i class="Hui-iconfont"></i> 发布新版本</a>
 </span>  <span class="r">{{count($appversions)}}<strong></strong> 条</span> </div>

    <div class="mt-20">
    <table class="table table-border table-bordered table-hover table-bg table-sort">
        <thead>
            <tr class="text-c">

                <th width="30">id</th>
                <th width="90">版本</th>
                <th width="40">文件</th>
                <th width="120">状态</th>
                <th width="90">类型</th>
                <th width="90">备注</th>
                <th width="90">时间</th>
                <th width="100">操作</th>
            </tr>
        </thead>
        <tbody>

            @foreach($appversions as $appversion)
            <tr class="text-c">
              <td>{{$appversion->id}}</td>

              <td>{{$appversion->vname}}</td>
              <td>{{$appversion->file}}</td>
              <td>
@if($appversion->static==1)
不升级
@elseif($appversion->static==2)
提示
@else
强制升级
@endif
                </td>
              <td>

                @if($appversion->type==1)
                andriod
                @else
                ios
                @endif



              </td>
              <td>{{$appversion->remark}}</td>
              <td>{{$appversion->time}}</td>


              <td class="td-manage">
                <a title="删除" href="javascript:;" onclick="verdel('{{$appversion->id}}','{{$appversion->vname}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont"></i></a>
              </td>

            </tr>
      @endforeach
                    </tbody>
    </table>
    <div class="page">
        <ul class="pagination"></ul>
    </div>
    </div>
</div>
@section('my-js')

<script >
function verdel(id,name){
layer.confirm('确认要删除版本号为【'+name+'】的信息吗？',function(index){

		$.ajax({
		type:'post',
		url:'/ad/service/appversions/del',
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

function release(title, url){
		layer_show(title,url,700,770);
	}
</script>
@endsection
