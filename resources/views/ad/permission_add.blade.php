@extends('ad.master')
@section('content')
<form action="" method="post" class="form form-horizontal" id="form-permission-add">


  {{ csrf_field() }}


  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>管理员帐号：</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="name" datatype="*" nullmsg="管理员名称不能为空">
    </div>
    <div class="col-4"> </div>
  </div>

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>管理员密码：</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="pwd" datatype="*" nullmsg="密码不能为空">
    </div>
    <div class="col-4"> </div>
  </div>

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>权限设置</label>

    <div class="col-4">

    <select class="select" name="qx"  id="qx" size="1">
        <option>0</option>
        <option>1</option>
        <option>2</option>
      <option>3</option>



      </select>

    </div>
  </div>




  <div class="row cl">
    <div class="col-9 col-offset-3">
      <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
    </div>
  </div>
</form>
@section('my-js')
<script type="text/javascript">


$("#form-permission-add").Validform({
  tiptype:2,
  callback:function(form){
$('#form-permission-add').ajaxSubmit({
type:'post',
url:'/ad/service/permission/add',
dataType:'json',
data:{

  name:$('input[name=name]').val(),
  pwd:$('input[name=pwd]').val(),

  qx:$('select[name=qx] option:selected').html(),


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
parent.location.reload();
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


  }
});


</script>
@endsection
