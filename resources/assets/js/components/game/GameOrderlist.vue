<template>
	<div class="game_time_right">
		<div class="game_time_member" v-for="(item,index) in orderList">
			<span class="game_time_member_title">第 <span>{{item.qihao}}</span> 期最强王者</span>
			<img width="36" v-bind:src="item.headPic">
			<div class="game_time_member_info">
				<span>{{item.name}}</span>
				<span>纯亏盈:<span :class="item.status == 1 ? 'game_time_shou' : 'game_time_kui'">{{item.profit}}</span></span>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default{
		mounted(){

		},
		data(){
			return {
				orderList:[
					{headPic:"./images/headPic2.gif", name:"河里浪", profit:"234,561,789", qihao:758194, status:1},
					{headPic:"./images/headPic.jpg", name:"天天赚钱啊", profit:"-189,261,419", qihao:758194, status:0}
				]
			}
		},
		methods:{

		}
	}
</script>