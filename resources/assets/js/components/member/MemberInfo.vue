<template>
	<div class="game_member">
		<div class="game_member_info">
			<div class="game_member_info_head"></div>
			<div class="game_member_info_name">
				<p>{{info.name}}</p>
				<p>等级: <span class="game_member_info_tag">18级</span></p>
				<p>ID: {{info.id}}</p>
				<p><span></span> 369 人</p>
			</div>
			<p class="game_user_jinbi">账户金币: <span>{{info.gold}}</span></p>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default{
		props:[
			"info"
		],
		data(){
			return {

			}
		},
		methods:{
			toThousand(num){
	            //金额格式化 183561124 -> 183,561,124
	            var result = [ ], counter = 0;
	            num = (num || 0).toString().split('');
	            for (var i = num.length - 1; i >= 0; i--) {
	                counter++;
	                result.unshift(num[i]);
	                if (!(counter % 3) && i != 0) { result.unshift(','); }
	            }
	            return result.join('');
	        }
		},
		created(){

			this.info.gold = this.toThousand(this.info.gold)

		}
	}
</script>