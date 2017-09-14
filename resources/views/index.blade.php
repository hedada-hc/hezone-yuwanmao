@extends('layouts.main')

@section('content')
<!-- 竞猜区域开始 -->
	<div class="game">
		
		<div class="game_content">
			<div class="game_nav">
				<ul>
					<li class="game_nav_selected"><a href="#">鱼丸28</a></li>
					<li><a href="#">蛋蛋28</a></li>
					<li><a href="#">蛋蛋16</a></li>
					<li><a href="#">韩国28</a></li>
					<li><a href="#">韩国16</a></li>
					<li><a href="#">鱼丸16</a></li>
					<li><a href="#">鱼丸10</a></li>
				</ul>
			</div>
			<div class="game_nav_help">
				<ul>
					<li><a href="#">鱼丸28首页</a></li>
					<li><a href="#">我的竞猜</a></li>
					<li><a href="#">游戏介绍</a></li>
					<li><a href="#">添加竞猜模式</a></li>
					<li><a href="#">托管竞猜</a></li>
					<li><a href="#">鱼丸28走势图</a></li>
				</ul>
			</div>

			
			
			<!-- 竞猜列表区域 -->
			<gamelotter></gamelotter>
		</div>

		<!-- 个人信息区 -->
		<div class="game_member">
			<div class="game_member_info">
				<div class="game_member_info_head"></div>
				<div class="game_member_info_name">
					<p>hezone_s</p>
					<p>等级: <span class="game_member_info_tag">18级</span></p>
					<p>ID: 18125</p>
					<p><span></span> 369 人</p>
				</div>
				<p class="game_user_jinbi">账户金币: <span>25,964,124</span></p>
			</div>
		</div>

		<!-- 竞猜胜率盈利信息 -->
		<div class="game_info">
			<div class="game_info_qi">
				<p>当前盈利</p>
				<span>6,789,123</span>
			</div>
			<div class="game_info_qi">
				<p>当前胜率</p>
				<span>61%</span>
			</div>
			<div class="game_info_qi">
				<p>参与期数</p>
				<span>125</span>
			</div>
			<div class="game_info_qi">
				<p>当前排名</p>
				<span class="game_info_shu"><span>输</span> 961</span>
				<span class="game_info_yin"><span>赢</span> 961</span>
			</div>
		</div>

		<!-- 领取救济 工资 银行入口 -->
		<div class="game_info_releef">
			<ul>
				<li><a class="game_info_jiuji" href="#">领取救济</a></li>
				<li><a class="game_info_gongzi" href="#">领取工资</a></li>
				<li><a class="game_info_yinhang" href="#">鱼丸银行</a></li>
			</ul>
		</div>

		<!-- 竞猜排行榜 -->
		<div class="game_ranking">
			<div class="game_ranking_head">
				<span></span>竞猜排行榜
			</div>
			<!-- 排行榜 -->
			<gamerankinglist></gamerankinglist>

		</div>
	</div>
<!-- 竞猜区域结束	 -->

@endsection