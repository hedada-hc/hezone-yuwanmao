<template>
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
	
	<tr v-for="(item, index) in lotters">
	    <td>{{item.id}}</td>
	    <td>{{item.lotter_time}}</td>

	    <td v-if="item.islotter">{{item.num1}}+{{item.num2}}+{{item.num3}}=<span class="game_luck_num">{{item.lotter_res}}</span></td>
	    <td v-else><span class="game_luck_num game_luck_x">?</span></td>

	    <td>351,631,112</td>
	    <td class="game_luck_zhong"><a href="#">{{item.lotter_count}}</a></td>
	    <td>
	    	<span class="game_luck_shou">收:24,531,971</span>
	    	<span>竟:2,000,000</span>
	    </td>
	    <td>
	    	<div  v-if="item.num1" class="game_luck_btn_jing">竞猜</div>
	    	<div v-else class="game_luck_btn_yikai">已开</div> 
	    </td>
  	</tr>
</table>
</div>  	
</template>

<script type="text/javascript">
	export default {
		mounted(){
			axios.get("http://www.yuwan.com/api/v1/query?type=1").then(response => {
				this.lotters = response.data;
				console.log(this.lotters);
			})
		},
		data(){
			return {
				"data":false,
				"lotters":null
			}
		},
		methods:{
			kaijiang(){
				axios.get('api/v1/lotter').then( response => {
	                console.log(response,this.username,this.password)
	            })
			}
		}
	}
	
});
</script>