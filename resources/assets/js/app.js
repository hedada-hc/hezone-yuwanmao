
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('demo',require('./components/DemoData.vue'));
Vue.component('gameluck', require('./components/game/GameLuck28'));
Vue.component('gamelotterlist', require("./components/game/GameluckList"));
Vue.component('gameorderlist', require("./components/game/GameOrderlist"));
Vue.component('gamerankinglist', require("./components/game/GameRankingList"));
Vue.component('danmu', require("./components/game/DanMu"));
const app = new Vue({
    el: '#app',
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
    }
});
