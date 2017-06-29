/**
 * Created by surprisepeas on 2017/6/4.
 */
import Vue from 'vue'
import { http } from './services'


Vue.config.debug = true;

new Vue({
	el: '#app',
	render: h => h(require('./app.vue')),
	create () {
		http.init();
	}
});