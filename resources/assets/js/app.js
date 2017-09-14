
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import router from './routes.js';
import _ from 'lodash';
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

Vue.use(VueRouter);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('demo',require('./components/DemoData.vue'));
Vue.component('gameorderlist', require("./components/game/GameOrderlist"));
Vue.component('danmu', require("./components/game/DanMu"));
Vue.component('gameluck', require('./components/game/GameLuck28'));
Vue.component('gamelotterlist', require("./components/game/GameluckList"));
Vue.component('gamelotter', require("./components/game/GameLotter"));
Vue.component('gamerankinglist', require("./components/game/GameRankingList"));
Vue.component('gamezoushitu', require("./components/game/GameZoushi"));
Vue.component('register', require("./components/auth/AuthRegister"));
Vue.component('login', require("./components/auth/AuthLogin"));
Vue.component('member-info', require("./components/member/MemberInfo"));
Vue.component('betting', require("./components/game/GameBetting"));

const app = new Vue({
    el: '#app',
    router,
    data:{
    	"closeLogin": true,
    },
    methods:{
    	login(){
            var status = $(".login").eq(0).attr("style");
            if(/none/.test(status) || status == null){
    			$(".login").show();
            }else{
                $(".login").hide();
            }
		}
        
    },
    created(){
        console.log(window.Laravel)
    }
});
