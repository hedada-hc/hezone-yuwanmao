<template>
<div class="register">
	<div class="register_ad">
		<p class="register_ad_title">实时兑奖</p>
		<ul>
			<li v-for="(item,index) in shishi">
				<img :src="item.head"/>
				<span>鱼丸第**</span>
				<span class="register_ad_time">1分钟前</span>
				<p>100元移动充值卡</p>
			</li>
		</ul>
		<div class="register_ad_banner">
			<a href="/game">
				<img :src="bannerURL">
			</a>
		</div>
	</div>
	<div class="register_reg">
		<form method="post" action="/register">
			<input type="hidden" name="_token" v-model="token.csrfToken">
			<p class="register_reg_title">注册鱼丸猫</p>
			<div class="register_reg_from">
				<svg class="icon" aria-hidden="true">
		            <use xlink:href="#icon-xinren"></use>
		        </svg>
				<input type="text" name="name" placeholder="请输入昵称">
			</div>

			<div class="register_reg_from">
				<svg class="icon" aria-hidden="true">
		            <use xlink:href="#icon-mima-copy"></use>
		        </svg>
				<input type="password" name="password" placeholder="请输入密码">
			</div>

			<div class="register_reg_from">
				<svg class="icon" aria-hidden="true">
		            <use xlink:href="#icon-shouji"></use>
		        </svg>
				<input type="text" name="phone" placeholder="请输入手机号码">
			</div>
			
			<div class="register_reg_from register_reg_code" >
				<svg class="icon" aria-hidden="true">
		            <use xlink:href="#icon-yanzhengma"></use>
		        </svg>
				<input type="text" name="code" placeholder="请输入手机验证码">
			</div>
			
			<button type="button" :class="isCode ? 'register_reg_getcode' : 'register_reg_getcode register_reg_iscode'" @click="getCode($event)">获取手机验证码</button>
			<button type="submit" class="register_register">立即注册</button>
		</form>
		
	</div>
</div>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				"bannerURL":"./images/banner/reg_banner.jpg",
				"shishi":[
					{"head":"./images/headPic2.gif","name":"测试啊","time":"1分钟前","good_title":"100元移动充值卡"},
					{"head":"./images/headPic2.gif","name":"测试啊","time":"1分钟前","good_title":"100元移动充值卡"},
					{"head":"./images/headPic2.gif","name":"测试啊","time":"1分钟前","good_title":"100元移动充值卡"},
					{"head":"./images/headPic2.gif","name":"测试啊","time":"1分钟前","good_title":"100元移动充值卡"},
					{"head":"./images/headPic2.gif","name":"测试啊","time":"1分钟前","good_title":"100元移动充值卡"},
					{"head":"./images/headPic2.gif","name":"测试啊","time":"1分钟前","good_title":"100元移动充值卡"},
					{"head":"./images/headPic2.gif","name":"测试啊","time":"1分钟前","good_title":"100元移动充值卡"},
					{"head":"./images/headPic2.gif","name":"测试啊","time":"1分钟前","good_title":"100元移动充值卡"},
					{"head":"./images/headPic2.gif","name":"测试啊","time":"1分钟前","good_title":"100元移动充值卡"},
					{"head":"./images/headPic2.gif","name":"测试啊","time":"1分钟前","good_title":"100元移动充值卡"},
					{"head":"./images/headPic2.gif","name":"测试啊","time":"1分钟前","good_title":"100元移动充值卡"},
					{"head":"./images/headPic2.gif","name":"测试啊","time":"1分钟前","good_title":"100元移动充值卡"}
				],
				"isCode":true,
				"time":60,
				"token":''
			}
		},
		methods:{
			getCode(e){
				if(this.time <= 0 || this.time >= 60){
					this.isCode = this.isCode ? false : true;
					setInterval(()=>{
						this.time -= 1;
						e.path[0].innerText = "倒计时" + this.time + "秒"
					},1000)
				}
			}
		},
		created(){
			this.token = window.Laravel;
		}
	}
</script>