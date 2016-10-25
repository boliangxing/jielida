@extends('ad.master')
@section('content')
<div class="container-fluid">
<h1>设备数据</h1>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        搜索时间区间：
      </a>
    </div>
    <form class="navbar-form navbar-left" role="search" onsubmit="return false;">
      <div class="form-group">
        <div class="controls">
        	<div id="reportrange" class="pull-left dateRange" style="width:350px">
        		<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
        		<span id="searchDateRange">2016-10-23 16:59:35 - 2016-10-24 16:59:35</span>
        		<b class="caret"></b>
        	</div>
		</div>
      </div>
      <button type="submit" class="btn btn-default" onclick="locationhref()">搜索</button>
    </form>
  </div>
</nav>
<div class="row">
    <div class="col-md-9">
        <table class="table table-border table-bordered table-hover rule">
            <thead>
                <tr>
                	                    <th>
                        报警                    </th>
                                        <th>
                        开关                    </th>
                                        <th>
                        童锁                    </th>
                                        <th>
                        从机连接状态                    </th>
                                        <th>
                        tcp                    </th>
                                        <th>
                        login                    </th>
                                        <th>
                        温度(℃)                    </th>
                                        <th>
                        湿度(%)                    </th>
                                        <th>
                        粉尘(ug/m³)                    </th>
                                        <th>
                        甲醛(ug/m³)                    </th>
                                 		<th>更新时间</th>
                </tr>
            </thead>
            <tbody>
				                <tr>
                	                    <td>
                    断网                    </td>
                                        <td>
                    开机                    </td>
                                        <td>
                    未锁                    </td>
                                        <td>
                    3                    </td>
                                        <td>
                    1                    </td>
                                        <td>
                    1                    </td>
                                        <td>
                    27.2                    </td>
                                        <td>
                    72.6                    </td>
                                        <td>
                    56                    </td>
                                        <td>
                    2                    </td>

                	<td>2016-10-24 15:30:12</td>
                </tr>

            	            </tbody>
        </table>
        <ul class="pagination"><li class="active dh_pageLi"><a href="#">1</a></li><li><a href="" data-ci-pagination-page="2">2</a></li><li>
					<a href=" 0" data-ci-pagination-page="3">3</a>
				</li><li class="previous"><a href=" " data-ci-pagination-page="2" rel="next">»</a></li>
				<li class="previous"><a href=" " data-ci-pagination-page="95">末页</a></li></ul>
    </div>
    <div class="col-md-3">
    	<div class="panel panel-default">
    	  <div class="panel-heading">设备信息</div>
    	  <div class="panel-body">
    	      <ul>
				<li>设备名称: 10000008</li>
				<li>设备编号(fid): 10000008</li>
				<li>产品编号(id): 100</li>
				<li>接入时间: 2016-10-24 07:37:28</li>
				<li>更新时间: 2016-10-24 15:55:23</li>
    	      </ul>
    	  </div>
    	</div>
    </div>
</div>
</div>
@section('my-js')
@endsection
