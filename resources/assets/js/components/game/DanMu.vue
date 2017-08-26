<template>
	<!-- 发送弹幕弹窗 -->
	

	<div class="game_danmu">
		<div class="game_danmu_tanchuang">
			<div class="game_danmu_title">鱼丸弹幕系统</div>
			<textarea v-model="DM.DMtext" placeholder="这里输入弹幕内容20字以内！还可以发红包哟" @click="textarea"></textarea>
			<div class="game_danmu_nav">
				<svg class="icon icon_hb" aria-hidden="true" @click="showHB">
				  <use xlink:href="#icon-hongbao1"></use>
				</svg>
			</div>
			<div class="game_danmu_sendhb">
				<input v-model="DM.DMHBje" type="number" min="1" max="10" name="jinbi" placeholder="Now，打算发多少红包呢？">
				<input v-model="DM.DMHBnum" type="number" name="num" placeholder="多少人分？">
				<svg class="icon" aria-hidden="true">
				  <use xlink:href="#icon-jinbi3"></use>
				</svg>
				<p>红包金额最低100金币起，最高500,000金币，最低2人分</p>
				<span>严厉打击利用红包系统刷注册金币，系统实时监控发现封号</span>
			</div>
			<div class="game_danmu_sendDM" @click="sendDM">发送弹幕</div>
		</div>
		<div class="game_mask" @click="hide">
					
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
				DM:{
					"DMtext":'',
					"DMHBje":null,
					"DMHBnum":null
				}
			}
		},
		methods:{
			sendDanMu(){
				$(".game_mask").show();
				$(".game_danmu_tanchuang").show();
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
			},
			hide(){
				$(".game_mask").hide();
				$(".game_danmu_tanchuang").hide();
			},
			textarea(){
				$("textarea").attr("style","color:#000000;font-size:16px;");
			},
			showHB(){
				if($(".game_danmu_sendhb").attr("style") == "display: block;"){
					$(".icon_hb").css({"color":"#afafaf"});
					$(".game_danmu_sendhb").hide();
					$(".game_danmu_sendDM").text("发送弹幕");
				}else{
					$(".icon_hb").css({"color":"#ff8765"});
					$(".game_danmu_sendhb").show();
					$(".game_danmu_sendDM").text("发送红包弹幕");
				}
			},
			sendDM(){
				console.log(this.DM)
			}
		}
	}
</script>



