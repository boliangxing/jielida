@extends('ad.master')
@section('content')
<form action="" method="post" class="form form-horizontal" id="form-scene-add">

{{csrf_field()}}
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>名称：</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="scname" datatype="*" nullmsg="名称不能为空">
    </div>
    <div class="col-4"> </div>
  </div>




  <div class="row cl">
    <div class="col-9 col-offset-3">
      <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
    </div>
  </div>
</form>
@endsection


@section('my-js')
<script type="text/javascript">
$("#form-scene-add").Validform({
  tiptype:2,
  callback:function(form){
$('#form-scene-add').ajaxSubmit({
type:'post',
url:'/ad/service/scene/add',
dataType:'json',
data:{
name:$('input[scname=scname]').val(),

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
