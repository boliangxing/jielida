@extends('ad.master')
@section('content')

<div class="pd-20">
  <form action="" method="post" class="form form-horizontal" id="form-cmds-add" enctype="multipart/form-data">
    <div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>版本：</label>
      <div class="formControls col-5">
        <input type="text" class="input-text" value="" placeholder="" id="version-name" name="version-name" datatype="*1-16" nullmsg="版本信息不能为空">
      </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
    <div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>系统类型：</label>
      <div class="formControls col-5 skin-minimal"  >


        <select name="version-leixing" aria-controls="DataTables_Table_0" class="select" style="width:100px">
            <option value="1">Andriot</option>
            <option value="2">IOS</option>

          </select>
            </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
    <div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>升级提示：</label>
      <div class="formControls col-5 skin-minimal"  >


        <select name="version-tootips" aria-controls="DataTables_Table_0" class="select" style="width:100px">
            <option value="1">不提示</option>
            <option value="2">提示</option>
            <option value="3">强制</option>
         </select>
            </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
    <div class="row cl">
      <label class="form-label col-3">安装包：</label>
      <div class="formControls col-5"> <span class="btn-upload form-group">
        <input class="input-text upload-url" type="text" name="file" id="uploadfile-2" readonly="" style="width:200px">
        <a href="javascript:void();" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont"></i> 浏览文件</a>
        <input type="file" multiple="" name="filename" class="input-file">
        </span> </div>
      <div class="col-4"> </div>
    </div>
    <div class="row cl">
      <label class="form-label col-3">说明：</label>
      <div class="formControls col-5">
        <textarea name="remark" cols="" rows="" class="textarea" placeholder="说点什么...最少输入10个字符" datatype="*0-100" dragonfly="true" nullmsg="备注不能超过100个字符！" onkeyup="textarealength(this,100)"></textarea>
        <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
      </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
    <div class="row cl">
      <div class="col-9 col-offset-3">
        <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
      </div>
    </div>
  </form>
</div>


@endsection




@section('my-js')

<script type="text/javascript">


$("#form-cmds-add").Validform({
  tiptype:2,
  callback:function(form){
$('#form-cmds-add').ajaxSubmit({
type:'post',
url:'/ad/service/cmds/add',
dataType:'json',
data:{

  name:$('input[name=version-name]').val(),
  leixing:$('select[name=version-leixing] option:selected').val(),
  tootips:$('select[name=version-tootips] option:selected').val(),
  filename:$('input[name=filename]').val(),
  remark:$('textarea[name=remark]').val(),
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
