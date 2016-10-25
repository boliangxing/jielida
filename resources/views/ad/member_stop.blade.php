@extends('ad.master')
@section('content')

<div class="pd-20">
  <form action="" method="post" class="form form-horizontal" id="form-member-stop">
    <div class="row cl">
    <label class="form-label col-3"><span class="c-red"></span>选择用户状态：</label>
    <div class="formControls col-5">
      <span class="select-box">
      	<select name="" class="select">
      		<option value="-1" @if($user!=null && $user->state == -1)
      		  selected
      		@endif>未启用</option>
      		<option value="1" value="1" @if($user!=null &&$user->state == 1)
      		  selected
      		@endif>已启用</option>

      	</select>
      </span>
    </div>
    <div class="col-4"> </div>
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
  $("#form-member-stop").Validform({
    tiptype:2,
    callback:function(form){
      var state = $('select option:selected').val();
      $('#form-member-stop').ajaxSubmit({
          type: 'post', // 提交方式 get/post
          url: '/ad/service/member/stop', // 需要提交的 url
          dataType: 'json',
          data: {
            id: "{{$user->uid}}",
            state: state,
            _token: "{{csrf_token()}}"
          },
          success: function(data) {
            if(data == null) {
              layer.msg('服务端错误', {icon:2, time:2000});
              return;
            }
            if(data.status != 0) {
              layer.msg(data.message, {icon:2, time:2000});
              return;
            }
            layer.msg(data.message, {icon:1, time:2000});
            parent.location.reload();
          },
          error: function(xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
            layer.msg('ajax error', {icon:2, time:2000});
          },
          beforeSend: function(xhr){
            layer.load(0, {shade: false});
          },
        });
        return false;
    }
  });
</script>
@endsection
