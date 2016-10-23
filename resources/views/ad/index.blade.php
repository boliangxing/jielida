
@extends('ad.master')
@section('content')
 <header class="Hui-header cl"> <a class="Hui-logo l" title="洁立达后台" href="/">洁立达</a> <a class="Hui-logo-m l" href="/" title="H-ui.admin">洁立达</a> <span class="Hui-subtitle l">后台---laravel</span>

	<ul class="Hui-userbar">
    <li id="Hui-skin" class="dropDown right dropDown_hover"><a href="javascript:;" title="换肤">换肤<i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
      <ul class="dropDown-menu radius box-shadow">
        <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
        <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
        <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
        <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
        <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
        <li><a href="javascript:;" data-val="orange" title="绿色">橙色</a></li>
      </ul>
    </li>
		<li>{{$admin->num}}</li>


				<li><a href="/ad/exit">退出</a></li>
			</ul>

		</li>

	<a href="javascript:;" class="Hui-nav-toggle Hui-iconfont" aria-hidden="false">&#xe667;</a> </header>
<aside class="Hui-aside">
	<input runat="server" id="divScrollValue" type="hidden" value="" />
	<div class="menu_dropdown bk_2">

    <dl id="menu-product">
      <dt><i class="Hui-iconfont">&#xe620;</i> 用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
      <dd>
        <ul>
          <li><a _href="member" data-title="用户列表" href="javascript:void(0)">用户列表</a></li>
          <li><a _href="memberfeedback" data-title="用户反馈" href="javascript:void(0)">用户反馈</a></li>

        </ul>
      </dd>
    </dl>
    <dl id="menu-product">
      <dt><i class="Hui-iconfont">&#xe620;</i> 设备管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
      <dd>
        <ul>
          <li><a _href="device" data-title="设备列表" href="javascript:void(0)">设备列表</a></li>
          <li><a _href="110" data-title="报警记录" href="javascript:void(0)">报警记录</a></li>

        </ul>
      </dd>
    </dl>
    <dl id="menu-product">
      <dt><i class="Hui-iconfont">&#xe620;</i> 产品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
      <dd>
        <ul>
          <li><a _href="product_add_brefore" data-title="新增产品" href="javascript:void(0)">新增产品</a></li>
          <li><a _href="product_list" data-title="产品列表" href="javascript:void(0)">产品列表</a></li>
</ul>
      </dd>
    </dl>
    <dl id="menu-product">
      <dt><i class="Hui-iconfont">&#xe620;</i> 微信管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
      <dd>
        <ul>
          <li><a _href="we_list" data-title="微信接入" href="javascript:void(0)">微信接入</a></li>
          <li><a _href="we_menu" data-title="自定义菜单" href="javascript:void(0)">自定义菜单</a></li>
          <li><a _href="we_reply" data-title="关注回复" href="javascript:void(0)">关注回复</a></li>

        </ul>
      </dd>
    </dl>
    <dl id="menu-product">
      <dt><i class="Hui-iconfont">&#xe620;</i> App管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
      <dd>
        <ul>
          <li><a _href="app_cmds" data-title="操作日志" href="javascript:void(0)">操作日志</a></li>
          <li><a _href="app_versions" data-title="App版本" href="javascript:void(0)">App版本</a></li>

        </ul>
      </dd>
    </dl>
				<dl id="menu-product">
					<dt><i class="Hui-iconfont">&#xe620;</i> 场景管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
					<dd>
						<ul>
							<li><a _href="scene" data-title="分类管理" href="javascript:void(0)">分类管理</a></li>
 						</ul>
					</dd>
				</dl>
				<dl id="menu-product">
					<dt><i class="Hui-iconfont">&#xe620;</i> 代理商管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
					<dd>
						<ul>

							<li><a _href="agency" data-title="管理列表" href="javascript:void(0)">管理列表</a></li>
						</ul>
					</dd>
				</dl>
				<dl id="menu-product">
					<dt><i class="Hui-iconfont">&#xe620;</i> 后台权限管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
					<dd>
						<ul>

							<li><a _href="permission" data-title="权限列表" href="javascript:void(0)">后台用户权限列表</a></li>
						</ul>
					</dd>
				</dl>



</aside>
<div class="dislpayArrow"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active"><span title="我的桌面" data-href="welcome">我的桌面</span><em></em></li>
			</ul>
		</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
	</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="welcome"></iframe>
		</div>
	</div>
</section>

@endsection
