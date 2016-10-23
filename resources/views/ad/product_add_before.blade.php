@extends('ad.master')
@section('content')

<div class="container-fluid" style="margin-left:100px">
<h1>产品添加说明</h1>
<div class="alert alert-danger" role="alert">警告：非专业人士请勿随意添加产品</div>
<div class="list-group">
  <a href="#" class="list-group-item"  style="text-decoration : none ;margin-left:30px">
    <h4 class="list-group-item-heading">第一步</h4>
    <p class="list-group-item-text">编辑产品型号</p>
    <p class="list-group-item-text">编辑产品描述</p>
    <p class="list-group-item-text">编辑产品展示图片</p>
    <p class="list-group-item-text">设置产品方案</p>
  </a>

  <a href="#" class="list-group-item"  style="text-decoration : none ;margin-left:30px">
    <h4 class="list-group-item-heading">第二步</h4>
    <p class="list-group-item-text">设置产品方案参数</p>
  </a>

  <a href="#" class="list-group-item"  style="text-decoration : none ;margin-left:30px">
    <h4 class="list-group-item-heading">第三步</h4>
    <p class="list-group-item-text">生成数据库</p>
    <p class="list-group-item-text">完成添加</p>
  </a>

</div>

<a class="btn btn-primary" href="/ad/product_add">开始添加</a>
</div>

<div id="qb-sougou-search" style="display: none; opacity: 0;"><p>搜索</p><p class="last-btn">复制</p><iframe src=""></iframe></div>
@section('my-js')
@endsection
