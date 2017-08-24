<template>
	<!-- 发送弹幕弹窗 -->
	

	<div class="game_danmu">
		<div class="game_danmu_tanchuang">
			<h1>测试发送弹幕</h1>
		</div>

		<div class="game_danmu_block"></div>
		<div class="game_danmu_tag">
			鱼丸弹幕
		</div>
		<div class="game_danmu_content">
			<ul>
				<li :class="danmus.type ? 'game_danmu_hongbao_border' : ''" v-for="danmus in danmuData">
					<a v-if="danmus.type == 0" href="http://www.yuwanmao.com/member/136411">
						<img width="32" v-bind:src="danmus.headPic">
						<div class="game_danmu_content_msg">
							<span>{{danmus.title}}</span>
							<span class="game_danmu_name">{{danmus.nick}}  <p>盈利：13,561,210</p></span>
						</div>
					</a>

					<a v-else href="http://www.yuwanmao.com/member/136411">
						<img width="32" v-bind:src="danmus.headPic">
						<div class="game_danmu_content_msg game_danmu_hongbao">
							<span>今天赚了很多来一波红包给你们</span>
						</div>
					</a>
				</li>
			</ul>
		</div>

		<div @click="sendDanMu" class="game_danmu_send">
			发送弹幕
		</div>
	</div>
</template>

<script type="text/javascript">
	export default{
		mounted(){
			setInterval(this.lottorTime,1000)
			setInterval(this.danmu,100)
		},
		data(){
			return {
				"danmuData":[
					{"title":"测试弹幕系统啊","nick":"hezone","jinbi":123541325,"headPic":"./images/headPic.jpg","type":0},
					{"title":"测试红包弹幕消息啊","nick":"红包啊","jinbi":123541325,"headPic":"./images/headPic2.gif","type":1},
					{"title":"测试弹幕系统啊","nick":"hezone","jinbi":123541325,"headPic":"./images/headPic.jpg","type":0},
				],
				left:0,
				time:90,
			}
		},
		methods:{
			sendDanMu(){
				console.log({"title":"测试弹幕系统啊","nick":"hezone","jinbi":123541325,"headPic":"./images/headPic.jpg","type":0})
			},
			lottorTime(){
				if(this.time <= 0){
					this.time = 90;
				}else{
					this.time -= 1;
				}
			},
			danmu(){
				if($(".game_danmu_content ul").width() > Math.abs(this.left)){
					this.left -= 10;
					$(".game_danmu_content ul").animate({"left": this.left + "px"})
				}else{
					this.left = Math.abs(this.left);
					$(".game_danmu_content ul").animate({"left": this.left + "px"});
					this.left -= 10;
					$(".game_danmu_content ul").animate({"left": this.left + "px"})
				}
			}
		}
	}
</script>



