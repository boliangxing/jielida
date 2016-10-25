@extends('ad.master')
@section('content')
<form action="" method="post" class="form form-horizontal" id="form-agency-add">
<div class="row cl">
  <label class="form-label col-3"><span class="c-red">*</span>名称：</label>
  <div class="formControls col-5">
    <input type="text" class="input-text" value="" placeholder="" name="name" datatype="*" nullmsg="商户名不能为空">
  </div>
  <div class="col-4"> </div>
</div>
<div class="row cl">
  <label class="form-label col-3"><span class="c-red">*</span>电话：</label>
  <div class="formControls col-5">
    <input type="text" class="input-text" value="" placeholder="" name="phone" datatype="*" nullmsg="">
  </div>
  <div class="col-4"> </div>
</div>
<div class="row cl">
  <label class="form-label col-3">国家选择</label>
  <div class="formControls col-5"> <span class="select-box" style="width:150px;">
    <select class="select" name="country" size="1" id="country">

       @foreach($address as $temp)
      @if($temp->pparentid==Null&& $temp->cparentid==Null)
      <option  value="{{$temp->id}}">{{$temp->name}}</option>
      @endif
      @endforeach


    </select>
    </span> </div>
</div>
<div class="row cl">
  <label class="form-label col-3">省/州选择</label>
  <div class="formControls col-5"> <span class="select-box" style="width:150px;">
    <select class="select" name="province" id="province"size="1"  >




    </select>
    </span> </div>
</div>
<div class="row cl">
  <label class="form-label col-3">城市选择</label>
  <div class="formControls col-5"> <span class="select-box" style="width:150px;">
    <select class="select" name="city"  id="city" size="1">




    </select>
    </span> </div>
</div>

<div class="row cl">
  <label class="form-label col-3"><span class="c-red">*</span>街道</label>
  <div class="formControls col-5">
    <input type="text" class="input-text" value="" placeholder="" name="address" datatype="*" nullmsg="">
  </div>
  <div class="col-4"> </div>
</div>
<div class="row cl">
  <label class="form-label col-3"><span class="c-red">*</span>邮箱</label>
  <div class="formControls col-5">
    <input type="text" class="input-text" value="" placeholder="" name="email" datatype="*" nullmsg="">
  </div>
  <div class="col-4"> </div>
</div>
<div class="row cl">
  <label class="form-label col-3">等级选择</label>
  <div class="formControls col-5"> <span class="select-box" style="width:150px;">
    <select class="select" name="lv"  id="city" size="1">
      <option>0</option>
      <option>1</option>
      <option>2</option>
<option>3</option>



    </select>
    </span> </div>
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
$("#form-agency-add").Validform({
  tiptype:2,
  callback:function(form){
$('#form-agency-add').ajaxSubmit({
type:'post',
url:'/ad/service/agency/add',
dataType:'json',
data:{
name:$('input[name=name]').val(),
country:$('select[name=country] option:selected').html(),
province:$('select[name=province] option:selected').html(),
city:$('select[name=city] option:selected').html(),

phone:$('input[name=phone]').val(),
address:$('input[name=address]').val(),
email:$('input[name=email]').val(),
lv:$('select[name=lv] option:selected').val(),

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



_getagency();
$('#country').change(function (event){
_getagency()
})

function _getagency(){
 var country_id=$('#country option:selected').val();

 $.ajax({

 type: "GET",
 url: '/ad/service/agency/country_id/'+country_id,
 dataType: 'json',
 cache: false,
 success:function(data){


console.log(data);
$('#province').html('');
$('#city').html('');

for(var i=0;i<data.address.length;i++){
 var node='<option >'+data.address[i].name+ ' </option>'

$('#province').append(node);

}
 },
 error: function(xhr, status, error) {
   console.log(xhr);
   console.log(status);
   console.log(error);
 }
});
}

$('#province').change(function (event){
_getagencyByp()
})

function _getagencyByp(){
 var province_id=$('#province option:selected').val();
 var country_id=$('#country  option:selected').val();

 $.ajax({

 type: "GET",
 url: '/ad/service/agency/province_id/'+province_id+'/country_id/'+country_id,
 dataType: 'json',
 cache: false,
 success:function(data){


console.log(data);
$('#city').html('');
for(var i=0;i<data.address.length;i++){
 var node='<option>'+data.address[i].name+ ' </option>'

$('#city').append(node);

}
 },
 error: function(xhr, status, error) {
   console.log(xhr);
   console.log(status);
   console.log(error);
 }
});
}

</script>
@endsection
