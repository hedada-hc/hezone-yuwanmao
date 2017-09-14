<template>
<!-- 投注区域 -->
<div class="game_bet">
	<div class="game_bet_model">
		<ul>
			<li>
				<p>选号方式</p>
				<div class="game_bet_model_block">
					<div class="game_bet_model_block_line">
						<a @click="ModelSelect('单')">单</a>
						<a @click="ModelSelect('双')">双</a>
						<a @click="ModelSelect('大')">大</a>
						<a @click="ModelSelect('小')">小</a>
						<a @click="ModelSelect('中')">中</a>
						<a @click="ModelSelect('边')">边</a>
					</div>
					<div class="game_bet_model_block_bottom">
						<a @click="ModelSelect('大单')">大单</a>
						<a @click="ModelSelect('大双')">大双</a>
						<a @click="ModelSelect('小单')">小单</a>
						<a @click="ModelSelect('小双')">小双</a>
						<a @click="ModelSelect('单边')">单边</a>
						<a @click="ModelSelect('双边')">双边</a>
						<a @click="ModelSelect('小边')">小边</a>
						<a @click="ModelSelect('大边')">大边</a>
					</div>
				</div>
			</li>
			<li>
				<p>投注倍数/设置</p>
				<div class="game_bet_model_block">
					<div class="game_bet_model_block_line">
						<a>0.5</a>
						<a>0.8</a>
						<a>1.2</a>
						<a>1.5</a>
						<a>2</a>
						<a>5</a>
						<a>10</a>
					</div>
					<div class="game_bet_model_block_bottom">
						<a>上期</a>
						<a @click="ModelSelect('全包')">全包</a>
						<a>反选</a>
						<a>梭哈</a>
						<a @click="randomNum">随机选号</a>
					</div>
					<div class="game_bet_model_randNum">
						<ul v-for="item in randNum">
							<li>{{item}}</li>
						</ul>
					</div>
				</div>
			</li>
			<li>
				<p>自定义模式</p>
				<div class="game_bet_model_block">
					<a>单</a>
					<a>双</a>
					<a>大</a>
					<a>小</a>
					<a>中</a>
					<a>边</a>
				</div>
				<button>保存模式</button>
			</li>
		</ul>
	</div>
	<div class="game_bet_info">
		<ul>
			<li>
				<span>投注期数</span>
				<p>759194</p>
			</li>
			<li>
				<span>上期竞猜数据</span>
				<a class="game_bet_info_jing">
					<span>9 + 1 + 0 =</span>
					<p>10</p>
				</a>
			</li>
			<li>
				<span>上期竞猜金币</span>
				<p>1,903,461</p>
			</li>
			<li>
				<span>上期盈利金币</span>
				<p>-1,903,461</p>
			</li>
			<li>
				<button>立即购买</button>
				<div class="game_bet_info_now">
					<span>当前总竞猜金币</span>
					<p>{{total}}</p>
				</div>
			</li>
		</ul>
	</div>
	<div class="game_bet_num">
		<table>
			<tr>
				<th><i class="game_bet_num_allselect"></i></th>
				<th>选择号码</th>
				<th>返奖率</th>
				<th>我已竞猜</th>
				<th>投注金币</th>
				<th>倍数</th>
			</tr>
			
			<tr v-if="item != null || item == 0" v-for="(item,index) in luckInfo[0]">
				<td><i class="game_bet_num_select"></i></td>
				<td><span>{{index}}</span></td>
				<td>{{item}}</td>
				<td>0<i></i></td>
				<td v-if="default28.length > 0"><input v-model="default28[index - 0]" type="text" name=""></td>
				<td v-else><input type="text" name=""></td>
				<td>
					<button>0.5</button>
					<button>2</button>
					<button>5</button>
					<button>10</button>
				</td>
			</tr>

		</table>

		<table>
			<tr>
				<th><i class="game_bet_num_allselect"></i></th>
				<th>选择号码</th>
				<th>返奖率</th>
				<th>我已竞猜</th>
				<th>投注金币</th>
				<th>倍数</th>
			</tr>
			
			<tr v-if="item" v-for="(item,index) in luckInfo[1]">
				<td><i class="game_bet_num_select"></i></td>
				<td><span>{{index}}</span></td>
				<td>{{item}}</td>
				<td>0<i></i></td>
				<td><input v-model="default28[index]" type="text" name=""></td>
				<td>
					<button>0.5</button>
					<button>2</button>
					<button>5</button>
					<button>10</button>
				</td>
			</tr>
		</table>
	</div>
</div>	
</template>

<script type="text/javascript">
	export default{
		props:["bettype","qihao"],
		data(){
			return {
				"luckInfo":[],
				"default28":[],
				"default16":[1,3,6,10,15,21,25,27,27,25,21,15,10,6,3,1],
				"randNum":[],
				"total":0
			}
		},
		mounted(){
			this.$nextTick(()=>{
				axios.get('/api/v1/betInfo/'+this.bettype+"?qihao="+this.qihao).then(response => {
					var res = response.data;
					var loda = _.chunk(res.odds, res.odds.length / 2);
					this.handleOdds(loda);
					
				})
			})
		},
		methods:{
			handleOdds(data){
				var tmp = [];
				var tmp2 = [];
				if(this.bettype == 1){
					for(var i=0;i<data[1].length;i++){
						tmp[i + 14] = data[1][i];
					}
					this.luckInfo[1] = tmp;
					this.luckInfo[0] = data[0];
				}else{
					for(var i=0;i<data[0].length;i++){
						tmp[i + 3] = data[0][i];
						tmp2[i + 11] = data[1][i];
					}
					this.luckInfo[0] = tmp;
					this.luckInfo[1] = tmp2;
				}
				return this.luckInfo;
			},
			allSelect(){
				this.default28 = [1,3,6,10,15,21,28,36,45,55,63,69,73,75,75,73,69,63,55,45,36,28,21,15,10,6,3,1];
			},
			ModelSelect(isText){
				switch(isText){
					case "单":
						this.default28 = [0,3,0,10,0,21,0,36,0,55,0,69,0,75,0,73,0,63,0,45,0,28,0,15,0,6,0,1];
						break;
					case "双":
						this.default28 = [1,0,6,0,15,0,28,0,45,0,63,0,73,0,75,0,69,0,55,0,36,0,21,0,10,0,3,0];
						break;
					case "大":
						this.default28 = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,75,73,69,63,55,45,36,28,21,15,10,6,3,1];
						break;
					case "小":
						this.default28 = [1,3,6,10,15,21,28,36,45,55,63,69,73,75,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
						break;
					case "大单":
						this.default28 = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,73,0,63,0,45,0,28,0,15,0,6,0,1];
						break;
					case "小单":
						this.default28 = [0,3,0,10,0,21,0,36,0,55,0,69,0,75,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
						break;
					case "大双":
						this.default28 = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,75,0,69,0,55,0,36,0,21,0,10,0,3,0];
						break;
					case "小双":
						this.default28 = [1,0,6,0,15,0,28,0,45,0,63,0,73,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
						break;
					case "单边":
						this.default28 = [0,3,0,10,0,21,0,36,0,55,0,0,0,0,0,0,0,0,0,45,0,28,0,15,0,6,0,1];
						break;
					case "双边":
						this.default28 = [1,0,6,0,15,0,28,0,45,0,0,0,0,0,0,0,0,0,55,0,36,0,21,0,10,0,3,0];
						break;
					case "大边":
						this.default28 = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,55,45,36,28,21,15,10,6,3,1];
						break;
					case "小边":
						this.default28 = [1,3,6,10,15,21,28,36,45,55,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
						break;
					default:
					 	this.default28 = [1,3,6,10,15,21,28,36,45,55,63,69,73,75,75,73,69,63,55,45,36,28,21,15,10,6,3,1];	
				}
			},
			randomNum(){ 
				var randoms=[];
				while (true){
				    var isExists = false;
				    // 获取一个10–100范围的数
				    var random = parseInt(0 + 27 * (Math.random()))
				    // 判断当前随机数是否已经存在
				    for (var i = 0; i < randoms.length; i++) {
				        if (random === randoms[i]) {
				            isExists = true;
				            break;
				        }
				    }
				    // 如果不存在，则添加进去
				    if (!isExists)
				        randoms.push(random);
				    // 如果有10位随机数了，就跳出
				    if (randoms.length === 10)
				        break;
				}
				this.randNum = randoms
			}
		}
	}
</script>
