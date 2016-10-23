@extends('ad.master')
@section('content')
<form method="POST">
<textarea cols="150" rows="30" name="menu">[
    {
        "type": "view",
        "name": "使用指南",
        "url": "http://jld.139.hk/webApp"
    },
    {
        "type": "view",
        "name": "净化器",
        "url": "http://jld.139.hk/webApp"
    },
    {
        "name": "智能家居",
        "sub_button": [
            {
                "type": "view",
                "name": "智能插座",
                "url": "http://jld.139.hk/webApp"
            },
            {
                "type": "view",
                "name": "空调",
                "url": "http://jld.139.hk/webApp"
            },
            {
                "type": "view",
                "name": "饮水机",
                "url": "http://jld.139.hk/webApp"
            },
            {
                "type": "view",
                "name": "除湿器",
                "url": "http://jld.139.hk/webApp"
            }
        ]
    }
]
</textarea>
<br>
<button type="submit">提交</button>
</form>
@section('my-js')
@endsection
