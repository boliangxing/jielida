@extends('ad.master')
@section('content')
<div class="pd-20">
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <select name="data" aria-controls="DataTables_Table_0" class="select" style="width:100px">
            <option value="10">三天</option>
            <option value="25">一个星期</option>
            <option value="50">一个月</option>
            <option value="100">一年</option>
        </select>
        前的内容
        <a class="btn btn-primary radius" onclick="del()">清除</a>
    </div>

    <div class="mt-20">
    <table class="table table-border table-bordered table-hover table-bg table-sort">
        <thead>
            <tr class="text-c">

                <th width="230">uid</th>
                <th width="290">url</th>
                <th width="240">方法</th>
                <th width="220">数据</th>
                <th width="190">ip</th>
                <th width="90">时间</th>
            </tr>
        </thead>
        <tbody>

            @foreach($appcmds as $appcmd)
            <tr class="text-c">
              <td>{{$appcmd->uid}}</td>

              <td>{{$appcmd->url}}</td>
              <td>{{$appcmd->method}}</td>

              <td>{{$appcmd->data}}</td>
              <td>{{$appcmd->ip}}</td>

              <td>{{$appcmd->time}}</td>



            </tr>
        @endforeach
                    </tbody>
    </table>
    <div class="page">
    </div>
    </div>
</div>
@section('my-js')
<script type="text/javascript">

	function  del(){
	alert('然而并没有完成');

}</script>
@endsection
