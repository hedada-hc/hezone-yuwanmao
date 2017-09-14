<template>
<div>
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
				第 <span class="game_time_info_qihao">{{qihao}}</span> 期 离竞猜截止时间，还有 <span class="game_time_info_mm">{{time}}</span> 秒
			</div>
			<a href="http://www.yuwanmao.com/vip" target="_black" class="game_time_info_vip">
				开通砖石VIP，领取866万金币
			</a>
		</div>
	</div>
		<!-- 每期排行榜 -->
		<gameorderlist></gameorderlist>
	</div>
	<!-- 弹幕区域 -->
	<danmu></danmu>
	<gamelotterlist :lotters="lotters"></gamelotterlist>
</div>
</template>

<script type="text/javascript">
	export default{
		data(){
			return {
				time:1,
				qihao:0,
				lotters:null,
				sign:'',
				appkey:"HeZone9527",
				jindu:0
			}
		},
		created(){
			setInterval(() => {
				if(this.time <= 0){
					this.lotterTime();
				}else{
					this.lotterTime
					this.time -= 1;
					//this.ins();
				}
				
			},1000)
		},
		methods:{
			lotterTime(){
				axios.get("api/v1/lottertime").then(response => {
					this.time = response.data.result.time;
					this.qihao = response.data.result.qihao;
					this.getLotterData();
				})
			},
			getLotterData(){
				var sign = this.deSign();
				axios.get("/api/v1/query?type=1&sign="+sign.sign+"&time="+sign.time).then(response => {
					this.lotters = response.data;
				})
			},
			deSign(){
				var time = JSON.stringify(new Date().getTime()).substr(0,10);
				this.sign = md5(time.substr(5,5) + this.appkey.substr(5,5));
				return {"time":time,"sign":this.sign};
			},
			ins(){
				if(/[\d]+/.test(this.jindu)){
					this.jindu += ((100 / 90) * 100 - this.time);
					$("ins").attr("style","width:"+this.jindu+"%");
				}else{
					this.jindu = 0;
				}
			}
		}
	}
</script>

<style type="text/css">
	
</style>