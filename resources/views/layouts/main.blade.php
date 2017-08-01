<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.ico" /> 
	<title>鱼丸猫官网_游戏试玩_游戏赚钱_广告任务</title>
	<meta name="keywords" content=网赚,网络兼职,玩游戏赚钱,网络赚钱,网赚平台,鱼丸猫>
	<meta name="description" content=鱼丸猫是一个网络兼职平台，用户通过完成“玩游戏赚钱、打码赚钱、完成任务”等操作，来实现网上赚钱，让用户能在工作之余或者玩游戏的同时赚到钱。>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/index.css')}}">
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/layer.js')}}"></script>
	
</head>
<body>
<div id="app">
<!-- 头部开始 -->
	<nav class="head">
		<div class="head_top">
			<ul>
				<li>累计发放奖励: <span class="gloden">290,368,697,152</span></li>
				<li>今日兑换金币: <span class="gloden">1,368,697,152</span></li>
				<li class="head_top_right">牛人榜</li>
				<li class="head_top_line"></li>
				<li class="head_top_right">客服中心</li>
				<li class="head_top_line"></li>
				<li class="head_top_right head_top_vip">VIP会员</li>
				<li class="head_top_line"></li>
				<li class="head_top_right head_top_reg"><a href="#">注册<span class="head_top_reward">奖2元</span></a></li>
				<li class="head_top_line"></li>
				<li class="head_top_right"><a href="#">登录</a></li>
			</ul>

			<div class="head_min">
				<a target="_black" href="http://www.yuwanmao.com" class="head_min_logo"></a>
			</div>

			<div class="head_nav">
				<ul>
					<li ><a href="{{url('/')}}">首页</a></li>
					<li><a href="#">新人活动</a></li>
					<li><a href="#">游戏试玩</a></li>
					<li><a href="#">玩棋牌</a></li>
					<li><a href="#">广告体验</a></li>
					<li class="head_nav_select"><a href="#">娱乐大厅</a></li>
					<li><a href="#">购物返利</a></li>
					<li><a href="#">邀请好友</a></li>
					<li><a href="#">兑换商城</a></li>
					<li class="head_nav_right"><a href="#">讨论区</a></li>
					<li class="head_nav_right"><a href="#">晒奖</a></li>
				</ul>
			</div>
		</div>
	</nav>
<!-- 头部结束 -->

	@yield('content')

<!-- 底部区域 -->
<div class="footer">
	<div class="footer_top">
		<div class="footer_top_content">
			<div class="footer_content">
				<a href=""></a>
			</div>
		</div>
	</div>
	<div class="footer_bommto">
		<div class="footer_bommto_content">
			Copyright © 2013-2017 YuWanMao Cloud. All Rights Reserved. 鱼丸猫 版权所有 京公网安备 11010802020287 京ICP备11018762号
		</div>
	</div>
</div>
</div>
<script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
<script type="text/javascript" src="{{asset('js/index.js')}}"></script>
</body>
</html>
