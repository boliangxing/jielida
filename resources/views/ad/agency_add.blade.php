
<form action="" method="post" class="form form-horizontal" id="form-agency-add">







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
    <input type="text" class="input-text" value="" placeholder="" name="name" datatype="*" nullmsg="密码不能为空">
  </div>
  <div class="col-4"> </div>
</div>

<div class="row cl">
  <label class="form-label col-3"><span class="c-red">*</span>权限设置</label>
 
  <div class="col-4"> </div>
</div>
  <div class="row cl">
    <div class="col-9 col-offset-3">
      <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
    </div>
  </div>
</form>

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
