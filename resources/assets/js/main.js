/**
 * Created by surprisepeas on 2017/6/4.
 */
import Vue from 'vue'
import { htpp } from './services'


Vue.config.debug = true

new Vue({
	el: '#app',
	render: h => h(require('./app.vue'))
});