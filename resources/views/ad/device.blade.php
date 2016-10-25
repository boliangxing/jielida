@extends('ad.master')
@section('content')

<div class="pd-20">

	<table class="table table-border table-bordered table-bg">
		<thead>

			<tr class="text-c">
 				<th width="40">FID</th>
				<th width="150">设备名称</th>
				<th width="90">设备IP</th>
				<th width="150">所属用户</th>
 				<th width="130">所属产品</th>
				<th width="130">添加时间</th>
				<th width="130">更新时间</th>
				<th width="130">设备</th>

				<th width="100">状态</th>

			</tr>
		</thead>
		<tbody>

			@foreach($jihe as $jh)
			<tr class="text-c">

				<td>{{$jh->fid}}</td>
				<td>{{$jh->facname}}</td>
				<td>{{$jh->ipaddr}}</td>
				<td>{{$jh->phone}}</td>
 <td>
@if($jh->product_id==100)
空气管家
@elseif($jh->product_id==101)
空气净化主机
@elseif($jh->product_id==102)
地暖
@elseif($jh->product_id==120)
空气盒子
@endif
	</td>
				<td>{{$jh->created_at}}</td>
				 <td>{{$jh->updated_at}}</td>
				 <td class="td-status">

<?php

$fac=explode(',',$jh->subfac);
for($index=0;$index<count($fac);$index++){

	echo "<a class='label label-success radius' style='margin-bottom:10px' onClick='device_fac('xxx','/ad/index')' >";

switch ($fac[$index]) {
	case '00':
		# code...
		echo "空气管家";
		break;
		case '01':
			# code...
			echo "空气净化器";
			break;	case '02':
					# code...
					echo "地暖";
					break;	case '20':
							# code...
							echo "空气盒子";
							break;
	default:
		# code...
		break;
}


echo "</a>";

echo "<br/>";
}
 ?>

				 </td>
				 <td class="td-status"><span class="label label-info radius">{{$jh->run_status}}</span></td>


			</tr>
		@endforeach

		</tbody>
	</table>
</div>
@section('my-js')
<script >

function device_fac(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);


}



</script>
@endsection
