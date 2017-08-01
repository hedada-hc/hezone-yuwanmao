@extends('layouts.main')

@section('content')
<!-- 竞猜区域开始 -->
	<div id="app" class="game">
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

			<!-- 竞猜开奖进度条 -->
			<div class="game_isn">
				<ins></ins>
			</div>
			<!-- 开奖时间区域 -->
			<div class="game_time">
				<div class="game_time_left">
					<div class="game_time_left_pic"></div>
					<div class="game_time_info">
						<div class="game_time_info_text">
							第 <span class="game_time_info_qihao">758195</span> 期 离竞猜截止时间，还有 <span class="game_time_info_mm">56</span> 秒
						</div>
						<a href="http://www.yuwanmao.com/vip" target="_black" class="game_time_info_vip">
							开通砖石VIP，领取866万金币
						</a>
					</div>
				</div>
				<div class="game_time_right">
					<div class="game_time_member">
						<span class="game_time_member_title">第 <span>758194</span> 期最强王者</span>
						<img width="36" src="./images/headPic.jpg">
						<div class="game_time_member_info">
							<span>河里浪</span>
							<span>纯亏盈:<span class="game_time_shou">234,561,789</span></span>
						</div>
					</div>

					<div class="game_time_member">
						<span class="game_time_member_title">第 <span>758194</span> 期倔强青铜</span>
						<img width="36" src="./images/headPic2.gif">
						<div class="game_time_member_info">
							<span>河里浪</span>
							<span>纯亏盈:<span class="game_time_kui">-234,561,789</span></span>
						</div>
					</div>
				</div>
			</div>

			<!-- 弹幕区域 -->
			<div class="game_danmu">
				<div class="game_danmu_block"></div>
				<div class="game_danmu_tag">
					鱼丸弹幕
				</div>
				<div class="game_danmu_content">
					<ul>

						{{-- <li v-for="danmus in danmuData">
							<a href="http://www.yuwanmao.com/member/136411">
								<img width="32" :src="danmus.headPic">
								<div class="game_danmu_content_msg">
									<span>{{danmus.title}}</span>
									<span class="game_danmu_name">{{danmus.nick}}  <p>盈利：13,561,210</p></span>
								</div>
							</a>
						</li> --}}


						<li class="game_danmu_hongbao_border">
							<a href="http://www.yuwanmao.com/member/136411">
								<img width="32" src="./images/headPic2.gif">
								<div class="game_danmu_content_msg game_danmu_hongbao">
									<span>今天赚了很多来一波红包给你们</span>
								</div>
							</a>
						</li>

					</ul>
				</div>
				<div class="game_danmu_send">
					发送弹幕
				</div>

			</div>


			<!-- 竞猜列表区域 -->
			<div class="game_luck">
				<table>
				  <tr>
				    <th>竞猜期号</th>
				    <th>开奖时间</th>
				    <th>竞猜结果</th>
				    <th>金币总数</th>
				    <th>中奖人数</th>
				    <th>收入/投入</th>
				    <th>竞猜</th>
				  </tr>
					<tr>
					    <td>758205</td>
					    <td>07-27 16:56</td>
					    <td><span class="game_luck_num game_luck_x">?</span></td>
					    <td>3,000,000,000</td>
					    <td class="game_luck_zhong">0</td>
					    <td>
					    	<span class="game_luck_shou">收:0</span>
					    	<span>竟:0</span>
					    </td>
					    <td>
					    	<div class="game_luck_btn_jing">竞猜</div> 
					    </td>
					</tr>

					<tr>
					    <td>758204</td>
					    <td>07-27 16:54</td>
					    <td><span class="game_luck_num game_luck_x">?</span></td>
					    <td>3,000,000,000</td>
					    <td class="game_luck_zhong">0</td>
					    <td>
					    	<span class="game_luck_shou">收:0</span>
					    	<span>竟:0</span>
					    </td>
					    <td>
					    	<div class="game_luck_btn_jing">竞猜</div> 
					    </td>
					</tr>

					<tr>
					    <td>758203</td>
					    <td>07-27 16:53</td>
					    <td><span class="game_luck_num game_luck_x">?</span></td>
					    <td>3,000,000,000</td>
					    <td class="game_luck_zhong">0</td>
					    <td>
					    	<span class="game_luck_shou">收:0</span>
					    	<span>竟:0</span>
					    </td>
					    <td>
					    	<div class="game_luck_btn_jing">竞猜</div> 
					    </td>
					</tr>

					<tr>
					    <td>758202</td>
					    <td>07-27 16:51</td>
					    <td><span class="game_luck_num game_luck_x">?</span></td>
					    <td>3,000,000,000</td>
					    <td class="game_luck_zhong">0</td>
					    <td>
					    	<span class="game_luck_shou">收:0</span>
					    	<span>竟:0</span>
					    </td>
					    <td>
					    	<div class="game_luck_btn_jing">竞猜</div> 
					    </td>
					</tr>

					<tr>
					    <td>758201</td>
					    <td>07-27 16:50</td>
					    <td><span class="game_luck_num game_luck_x">?</span></td>
					    <td>3,000,000,000</td>
					    <td class="game_luck_zhong">0</td>
					    <td>
					    	<span class="game_luck_shou">收:0</span>
					    	<span>竟:0</span>
					    </td>
					    <td>
					    	<div class="game_luck_btn_jing">竞猜</div> 
					    </td>
					</tr>

					
					<tr>
					    <td>758200</td>
					    <td>07-27 16:48</td>
					    <td>1+2+9=<span class="game_luck_num">12</span></td>
					    <td>25,351,631,112</td>
					    <td class="game_luck_zhong"><a href="#">891</a></td>
					    <td>
					    	<span class="game_luck_shou">收:24,531,971</span>
					    	<span>竟:2,000,000</span>
					    </td>
					    <td>
					    	<div class="game_luck_btn_yikai">已开</div> 
					    </td>
				  	</tr>

				  	<tr>
					    <td>758200</td>
					    <td>07-27 16:48</td>
					    <td>1+2+9=<span class="game_luck_num">12</span></td>
					    <td>25,351,631,112</td>
					    <td class="game_luck_zhong"><a href="#">891</a></td>
					    <td>
					    	<span class="game_luck_shou">收:24,531,971</span>
					    	<span>竟:2,000,000</span>
					    </td>
					    <td>
					    	<div class="game_luck_btn_yikai">已开</div> 
					    </td>
				  	</tr>

				  	<tr>
					    <td>758200</td>
					    <td>07-27 16:48</td>
					    <td>1+2+9=<span class="game_luck_num">12</span></td>
					    <td>25,351,631,112</td>
					    <td class="game_luck_zhong"><a href="#">891</a></td>
					    <td>
					    	<span class="game_luck_shou">收:24,531,971</span>
					    	<span>竟:2,000,000</span>
					    </td>
					    <td>
					    	<div class="game_luck_btn_yikai">已开</div> 
					    </td>
				  	</tr>

				  	<tr>
					    <td>758200</td>
					    <td>07-27 16:48</td>
					    <td>1+2+9=<span class="game_luck_num">12</span></td>
					    <td>25,351,631,112</td>
					    <td class="game_luck_zhong"><a href="#">891</a></td>
					    <td>
					    	<span class="game_luck_shou">收:24,531,971</span>
					    	<span>竟:2,000,000</span>
					    </td>
					    <td>
					    	<div class="game_luck_btn_yikai">已开</div> 
					    </td>
				  	</tr>

				  	<tr>
					    <td>758200</td>
					    <td>07-27 16:48</td>
					    <td>1+2+9=<span class="game_luck_num">12</span></td>
					    <td>25,351,631,112</td>
					    <td class="game_luck_zhong"><a href="#">891</a></td>
					    <td>
					    	<span class="game_luck_shou">收:24,531,971</span>
					    	<span>竟:2,000,000</span>
					    </td>
					    <td>
					    	<div class="game_luck_btn_yikai">已开</div> 
					    </td>
				  	</tr>

				  	<tr>
					    <td>758200</td>
					    <td>07-27 16:48</td>
					    <td>1+2+9=<span class="game_luck_num">12</span></td>
					    <td>25,351,631,112</td>
					    <td class="game_luck_zhong"><a href="#">891</a></td>
					    <td>
					    	<span class="game_luck_shou">收:24,531,971</span>
					    	<span>竟:2,000,000</span>
					    </td>
					    <td>
					    	<div class="game_luck_btn_yikai">已开</div> 
					    </td>
				  	</tr>

				  	<tr>
					    <td>758200</td>
					    <td>07-27 16:48</td>
					    <td>1+2+9=<span class="game_luck_num">12</span></td>
					    <td>25,351,631,112</td>
					    <td class="game_luck_zhong"><a href="#">891</a></td>
					    <td>
					    	<span class="game_luck_shou">收:24,531,971</span>
					    	<span>竟:2,000,000</span>
					    </td>
					    <td>
					    	<div class="game_luck_btn_yikai">已开</div> 
					    </td>
				  	</tr>
					
				</table>
			</div>
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

			<table>
				<tr>
					<th>排名</th>
					<th>昵称</th>
					<th>盈利</th>
					<th>奖励</th>
				</tr>
				<tr class="game_ranking_tr">
					<td><i class="game_ranking_no1"></i></td>
					<td>哈哈是*</td>
					<td>183,561,124<i></i></td>
					<td>5000万</td>
				</tr>
				<tr  class="game_ranking_tr">
					<td><i class="game_ranking_no2"></i></td>
					<td>potf*</td>
					<td>83,941,874<i></i></td>
					<td>2000万</td>
				</tr>
				<tr  class="game_ranking_tr">
					<td><i class="game_ranking_no3"></i></td>
					<td>旺旺ss*</td>
					<td>33,141,644<i></i></td>
					<td>1000万</td>
				</tr>
				<tr  class="game_ranking_tr">
					<td>4</td>
					<td>发哥卡*</td>
					<td>28,121,147<i></i></td>
					<td>500万</td>
				</tr>
				<tr  class="game_ranking_tr">
					<td>5</td>
					<td>活，该*</td>
					<td>20,748,745<i></i></td>
					<td>500万</td>
				</tr>
				<tr  class="game_ranking_tr">
					<td>6</td>
					<td>黑白*</td>
					<td>19,455,887<i></i></td>
					<td>500万</td>
				</tr>
				<tr  class="game_ranking_tr">
					<td>7</td>
					<td>每天1*</td>
					<td>18,787,456<i></i></td>
					<td>200万</td>
				</tr>
				<tr  class="game_ranking_tr">
					<td>8</td>
					<td>每天1*</td>
					<td>12,455,778<i></i></td>
					<td>100万</td>
				</tr>
				<tr  class="game_ranking_tr">
					<td>9</td>
					<td>dopa*</td>
					<td>11,788,547<i></i></td>
					<td>88万</td>
				</tr>
				<tr  class="game_ranking_tr">
					<td>10</td>
					<td>dar*</td>
					<td>10,614,127<i></i></td>
					<td>66万</td>
				</tr>
			</table>

		</div>
	</div>
<!-- 竞猜区域结束	 -->

@endsection