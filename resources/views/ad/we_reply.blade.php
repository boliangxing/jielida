@extends('ad.master')
@section('content')
<form method="POST" enctype="multipart/form-data">
<input type="text" name="title"><br>
<input type="file" name="img"><br>
<textarea name="content"></textarea><br>
<input type="text" name="url"><br>

<button type="submit">提交</button>
</form>
@section('my-js')
@endsection
