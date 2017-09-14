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
	
	<tr v-for="(item, index) in lotterData">
	    <td>{{item.id}}</td>
	    <td>{{item.lotter_time}}</td>

	    <td v-if="item.islotter">{{item.num1}}+{{item.num2}}+{{item.num3}}=<span class="game_luck_num">{{item.lotter_res}}</span></td>
	    <td v-else><span class="game_luck_num game_luck_x">?</span></td>

	    <td>351,631,112</td>
	    <td class="game_luck_zhong"><a href="#">{{item.lotter_count}}</a></td>
	    <td v-if="item.islotter">
	    	<span class="game_luck_shou">收:24,531,971</span>
	    	<span>竟:2,000,000</span>
	    </td>
	    <td v-else>
	    	<span class="game_luck_shou">收:0</span>
	    	<span>竟:0</span>
	    </td>
	    <td>
	    	<div  v-if="item.islotter" class="game_luck_btn_yikai">已开</div> 
	    	<a :href="'game/bet/yw28?qihao=' + item.id" v-else class="game_luck_btn_jing">竞猜</a>
	    </td>
  	</tr>
</table>
<!-- 分页 -->
<ul class="game_page">
	<li><a href="javascript:;" @click="page('<')"><</a></li>
	<li v-for="(item,index) in pageList"><a :class="item == hiPage ? 'game_page_select' : ''" @click="page(item)" href="javascript:;">{{item}}</a></li>
	<li><a href="javascript:;" @click="page('>')">></a></li>
</ul>
</div>  
</template>

<script type="text/javascript">
	export default {
		props:["lotters"],
		data(){
			return {
				"data":false,
				"pageList":[],
				"lotterData": this.lotters,
				"hiPage":1,
				"count":0
			}
		},
		created(){
			this.page();
		},
		methods:{
			kaijiang(){
				axios.get('api/v1/lotter').then( response => {
	                console.log(response,this.username,this.password)
	            })
			},
			page(pageIndex = null){
				if(pageIndex == "<") pageIndex = this.hiPage == 1 ? 1 : this.hiPage - 1;
				if(pageIndex == ">") pageIndex = this.hiPage == this.count ? this.count : this.hiPage + 1;
				axios.get('/api/v1/page?type=1&page='+pageIndex).then(response => {
					var data = response.data;
					var page = Math.ceil(data.count / 20);
					this.count = page;
					this.pageList = [];
					for(var i=0;i<page;i++){
						if(i <= 7){
							this.pageList.push(i + 1);
						}
						if((i+1) == page){
							this.pageList.push("....");
							this.pageList.push(page);
						}
					}
					this.hiPage = pageIndex == null ? 1 : +pageIndex;
					this.lotterData = data.result;
				})
			}
		}
	}
</script>