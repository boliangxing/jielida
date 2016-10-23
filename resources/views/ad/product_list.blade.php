@extends('ad.master')
@section('content')
<div class="mt-20">
    <table class="table table-border table-bordered table-hover table-bg table-sort">
        <thead>
            <tr class="text-c">
                <th width="300">产品ID</th>
                <th width="300">产品名称</th>
                <th width="300">产品描述</th>
                <th width="300">产品图标</th>
                <th width="300">操作</th>
            </tr>
        </thead>
        <tbody>
                         

            @foreach($products as $product)
      			<tr class="text-c">
              <td>{{$product->product_id}}</td>

      				<td>{{$product->product_name}}</td>
              <td>{{$product->product_des}}</td>
              <td><img src="/admin/images/{{$product->product_img}}" width="30"></td>


              <td class="td-manage">
                <button type="button" onclick="location.href='/admin/product/proedit?product_id=100'" class="btn btn-warning radius">编辑</button>
                  <button type="button" onclick="location.href='/admin/product/proplan?product_id=100'" class="btn btn-warning radius">方案</button>
              </td>
       			</tr>
      @endforeach
                    </tbody>
    </table>
    <div class="page">
        <ul class="pagination"></ul>
    </div>
    </div>
@section('my-js')
@endsection
