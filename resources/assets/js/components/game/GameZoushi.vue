<template>
	<div class="game_zoushi">
		<table>
			<tr>
				<th><span></span>次数</th>
				<th v-for="(item,index) in appear">{{item.cishu}}</th>
				<th>{{DXDSZB.dan}}</th>
				<th>{{DXDSZB.shuang}}</th>
				<th>{{DXDSZB.da}}</th>
				<th>{{DXDSZB.xiao}}</th>
				<th>{{DXDSZB.zhong}}</th>
				<th>{{DXDSZB.bian}}</th>
			</tr>
			<tr>
				<th><span></span>期号</th>
				<th><p class="game_zoushi_num">00</p></th>
				<th><p class="game_zoushi_num">01</p></th>
				<th><p class="game_zoushi_num">02</p></th>
				<th><p class="game_zoushi_num">03</p></th>
				<th><p class="game_zoushi_num">04</p></th>
				<th><p class="game_zoushi_num">05</p></th>
				<th><p class="game_zoushi_num">06</p></th>
				<th><p class="game_zoushi_num">07</p></th>
				<th><p class="game_zoushi_num">08</p></th>
				<th><p class="game_zoushi_num">09</p></th>
				<th><p class="game_zoushi_num_select">10</p></th>
				<th><p class="game_zoushi_num_select">11</p></th>
				<th><p class="game_zoushi_num_select">12</p></th>
				<th><p class="game_zoushi_num_select">13</p></th>
				<th><p class="game_zoushi_num_select">14</p></th>
				<th><p class="game_zoushi_num_select">15</p></th>
				<th><p class="game_zoushi_num_select">16</p></th>
				<th><p class="game_zoushi_num_select">17</p></th>
				<th><p class="game_zoushi_num">18</p></th>
				<th><p class="game_zoushi_num">19</p></th>
				<th><p class="game_zoushi_num">20</p></th>
				<th><p class="game_zoushi_num">21</p></th>
				<th><p class="game_zoushi_num">22</p></th>
				<th><p class="game_zoushi_num">23</p></th>
				<th><p class="game_zoushi_num">24</p></th>
				<th><p class="game_zoushi_num">25</p></th>
				<th><p class="game_zoushi_num">26</p></th>
				<th><p class="game_zoushi_num">27</p></th>
				<th><p class="game_zoushi_dan">单</p></th>
				<th><p class="game_zoushi_shuang">双</p></th>
				<th><p class="game_zoushi_da">大</p></th>
				<th><p class="game_zoushi_xiao">小</p></th>
				<th><p class="game_zoushi_zhong">中</p></th>
				<th><p class="game_zoushi_bian">边</p></th>
			</tr>
			<tr v-for="(item,index) in zoushitu">
				<td><span></span>{{item.id}}</td>
				<td><p :class="item.lotter_res == 0 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">00</p></td>
				<td><p :class="item.lotter_res == 1 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">01</p></td>
				<td><p :class="item.lotter_res == 2 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">02</p></td>
				<td><p :class="item.lotter_res == 3 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">03</p></td>
				<td><p :class="item.lotter_res == 4 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">04</p></td>
				<td><p :class="item.lotter_res == 5 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">05</p></td>
				<td><p :class="item.lotter_res == 6 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">06</p></td>
				<td><p :class="item.lotter_res == 7 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">07</p></td>
				<td><p :class="item.lotter_res == 8 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">08</p></td>
				<td><p :class="item.lotter_res == 9 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">09</p></td>
				<td><p :class="item.lotter_res == 10 ? 'game_zoushi_num_select game_zoushi_check' : 'game_zoushi_num_select'">10</p></td>
				<td><p :class="item.lotter_res == 11 ? 'game_zoushi_num_select game_zoushi_check' : 'game_zoushi_num_select'">11</p></td>
				<td><p :class="item.lotter_res == 12 ? 'game_zoushi_num_select game_zoushi_check' : 'game_zoushi_num_select'">12</p></td>
				<td><p :class="item.lotter_res == 13 ? 'game_zoushi_num_select game_zoushi_check' : 'game_zoushi_num_select'">13</p></td>
				<td><p :class="item.lotter_res == 14 ? 'game_zoushi_num_select game_zoushi_check' : 'game_zoushi_num_select'">14</p></td>
				<td><p :class="item.lotter_res == 15 ? 'game_zoushi_num_select game_zoushi_check' : 'game_zoushi_num_select'">15</p></td>
				<td><p :class="item.lotter_res == 16 ? 'game_zoushi_num_select game_zoushi_check' : 'game_zoushi_num_select'">16</p></td>
				<td><p :class="item.lotter_res == 17 ? 'game_zoushi_num_select game_zoushi_check' : 'game_zoushi_num_select'">17</p></td>
				<td><p :class="item.lotter_res == 18 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">18</p></td>
				<td><p :class="item.lotter_res == 19 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">19</p></td>
				<td><p :class="item.lotter_res == 20 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">20</p></td>
				<td><p :class="item.lotter_res == 21 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">21</p></td>
				<td><p :class="item.lotter_res == 22 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">22</p></td>
				<td><p :class="item.lotter_res == 23 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">23</p></td>
				<td><p :class="item.lotter_res == 24 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">24</p></td>
				<td><p :class="item.lotter_res == 25 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">25</p></td>
				<td><p :class="item.lotter_res == 26 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">26</p></td>
				<td><p :class="item.lotter_res == 27 ? 'game_zoushi_num game_zoushi_check' : 'game_zoushi_num'">27</p></td>
				
				<td><p :class="isdanshuang(item.lotter_res) == '单' ? 'game_zoushi_dan game_zoushi_check' : 'game_zoushi_dan'">单</p></td>
				<td><p :class="isdanshuang(item.lotter_res) == '双' ? 'game_zoushi_shuang game_zoushi_check' : 'game_zoushi_shuang'">双</p></td>

				<td><p :class="isdaxiao(item.lotter_res) == '大' ? 'game_zoushi_da game_zoushi_check' : 'game_zoushi_da'">大</p></td>
				<td><p :class="isdaxiao(item.lotter_res) == '小' ? 'game_zoushi_xiao game_zoushi_check' : 'game_zoushi_xiao'">小</p></td>

				<td><p :class="iszhongbian(item.lotter_res) == '中' ? 'game_zoushi_zhong game_zoushi_check' : 'game_zoushi_zhong'">中</p></td>
				<td><p :class="iszhongbian(item.lotter_res) == '边' ? 'game_zoushi_bian game_zoushi_check' : 'game_zoushi_bian'">边</p></td>
			</tr>
		</table>
	</div>
</template>

<script type="text/javascript">
	export default{
		props:["game_id"],
		data(){
			return {
				zoushitu:[],
				appear:[],
				DXDSZB:[]
			}
		},
		created(){
			axios.get('http://www.yuwan.com/api/v1/queryzs/'+this.game_id).then( response => {
                this.zoushitu = response.data.result
                this.appear = this.appearNum(this.zoushitu);
                this.DXDSZB = this.appearDXDSZB(this.zoushitu);
            })
		},
		methods:{
			isdanshuang(num){
				if(num % 2){
					return "单";
				}
				return "双";
			},
			isdaxiao(num){
				if(num > 13){
					return "大";
				}
				return "小";
			},
			iszhongbian(num){
				if(num > 9 && num <= 17){
					return "中";
				}
				return "边";
			},
			appearNum(numJson){
				var defaultNum = [
					{"cishu":0},{"cishu":0},{"cishu":0},{"cishu":0},
					{"cishu":0},{"cishu":0},{"cishu":0},{"cishu":0},
					{"cishu":0},{"cishu":0},{"cishu":0},{"cishu":0},
					{"cishu":0},{"cishu":0},{"cishu":0},{"cishu":0},
					{"cishu":0},{"cishu":0},{"cishu":0},{"cishu":0},
					{"cishu":0},{"cishu":0},{"cishu":0},{"cishu":0},
					{"cishu":0},{"cishu":0},{"cishu":0},{"cishu":0}
				];
				for(var i=0;i<numJson.length;i++){
					defaultNum[numJson[i].lotter_res].cishu += 1; 
				}
				return defaultNum;
			},
			appearDXDSZB(numJson){
				var defaultNum = {"zhong":0,"bian":0,"da":0,"xiao":0,"dan":0,"shuang":0};
				for(var i=0;i<numJson.length;i++){
					if(this.isdanshuang(numJson[i].lotter_res) == "单"){
						defaultNum.dan += 1;
					}else{
						defaultNum.shuang += 1;
					}

					if(this.isdaxiao(numJson[i].lotter_res) == "大"){
						defaultNum.da += 1;
					}else{
						defaultNum.xiao += 1;
					}

					if(this.iszhongbian(numJson[i].lotter_res) == "中"){
						defaultNum.zhong += 1;
					}else{
						defaultNum.bian += 1;
					}
				}
				return defaultNum;
			}
		}
	}
</script>