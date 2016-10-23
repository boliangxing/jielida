@extends('ad.master')
@section('content')
<div class="page-container">
    <form class="form form-horizontal" id="form-article-add" onsubmit="return false;">
        <div id="tab-system" class="HuiTab">
            <div class="tabBar cl"><span class="current">基本设置</span><!-- <span>安全设置</span><span>邮件设置</span><span>其他设置</span> --></div>
            <div class="tabCon" style="display:block">

@foreach($wechats as $wechat)
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>公众号名称：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input name="name" type="text" id="website-title" placeholder="控制在25个字、50个字节以内" value="{{$wechat->name}}" class="input-text">
                    </div>
                </div>



                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>公众号帐号：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input name="account" type="text" id="website-Keywords" placeholder="5个左右,8汉字以内,用英文,隔开" value="{{$wechat->account}}" class="input-text">
                    </div>
                </div>



                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>AppId：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input name="appid" type="text" id="website-static" placeholder="请填写APPID" value="{{$wechat->appID}}" class="input-text">
                    </div>
                </div>


                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>AppSecret：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input name="appsecret" type="text" id="website-uploadfile" placeholder="请填写APPSECRET" value="{{$wechat->appsecret}}" class="input-text">
                    </div>
                </div>



                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>接口地址：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="website-copyright" value="http://jld.139.hk/Wechat/home" readonly="true" class="input-text">
                    </div>
                </div>


                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">Token：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input name="token" type="text" id="website-icp" placeholder="请将设置的值保持与微信设置的一致" value="{{$wechat->Token}}" class="input-text">
                    </div>
                </div>
@endforeach
<div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button onclick="save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont"></i> 保存</button>
                <!-- <button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button> -->
            </div>
        </div>
        </div>
    </form>
</div>
@section('my-js')


<script type="text/javascript">
function save_submit(name,account,appID,appsecret,Token){
layer.confirm('确认要修改这些参数吗？',function(index){


		$.ajax({
		type:'post',
		url:'/ad/service/we_list/update',
		dataType:'json',
		data:{
			name:$('input[name=name]').val(),
	  account:$('input[name=account]').val(),
    appID:$('input[name=appid]').val(),
    appsecret:$('input[name=appsecret]').val(),
    Token:$('input[name=token]').val(),
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
