<template>
	<table>
		<tr>
			<th>排名</th>
			<th>昵称</th>
			<th>盈利</th>
			<th>奖励</th>
		</tr>
		<tr class="game_ranking_tr" v-for="(item,index) in winList">
			<td v-if="index <= 2"><i :class="index == 0 ? 'game_ranking_no1' : '' || index == 1 ? 'game_ranking_no2' : '' || index == 2 ? 'game_ranking_no3' : ''"></i></td>
			<td v-else>{{index + 1}}</td>
			<td>{{toName(item.name)}}</td>
			<td>{{toThousands(item.profit)}}<i></i></td>
			<td>{{item.bonus}}万</td>
		</tr>
	</table>
</template>

<script type="text/javascript">
	export default{
		mounted(){

		},
		data(){
			return {
				winList:[
					{name:"伤痛不过百日", profit:183561124, bonus: 3000},
					{name:"#状态进行中", profit:163697451, bonus: 2000},
					{name:"゛爱你の不止两三天ヾ", profit:133987431, bonus: 1000},
					{name:"℡ Sunny ゛", profit:132121345, bonus: 500},
					{name:"頸ょ鮮艸莓", profit:111235472, bonus: 500},
					{name:"非你不爱。", profit:103214512, bonus: 300},
					{name:"再鬧我急眼啊", profit:99123671, bonus: 300},
					{name:"回妆染痛颜。︶", profit:93311782, bonus: 200},
					{name:"狂风中拥抱你", profit:87614723, bonus: 200},
					{name:"忙晕了~~", profit:77694831, bonus: 100},
				]
			}
		},
		methods:{
			toThousands(num){
				//金额格式化 183561124 -> 183,561,124
				var result = [ ], counter = 0;
			    num = (num || 0).toString().split('');
			    for (var i = num.length - 1; i >= 0; i--) {
			        counter++;
			        result.unshift(num[i]);
			        if (!(counter % 3) && i != 0) { result.unshift(','); }
			    }
			    return result.join('');
			},
			toName(name){
				//名称格式化 伤痛不过百日 -> 伤痛不**
				return name.substr(0,2) + "**";
			}
		}
	}
</script>

