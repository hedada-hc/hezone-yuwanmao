<template>
    <div class="login" @click="hide($event)">
		<div class="login_t">
			<div class="login_win">
				<p class="login_title">鱼丸登录</p>
				<div class="login_input">
					<input type="text" name="username" v-model="username" placeholder="请输入账号/手机号码/ID">
				</div>
				<div class="login_input login_password">
					<input type="password" name="password" v-model="password" placeholder="请输入密码">
				</div>
				<div></div>
				<div class="login_submit" @click="login">
					立即登录
				</div>
			</div>
			<span class="login_glod"></span>
		</div>
	</div>	
</template>

<script>
    export default { 
        mounted() {
            console.log('Component mounted.')
        },
        data(){
        	return {
        		"username": null,
        		"password": null,
        	}
        },
        methods:{
        	login(){
				axios.get('api/v1/lotter').then( response => {
	                console.log(response,this.username,this.password)
	            })
			},
			hide(e){
				/*
  				 * 点击遮罩层则隐藏
				*/
				if(e.srcElement.className == "login"){
					$(".login").hide();
				}
				
			}
        }
    }
</script>
