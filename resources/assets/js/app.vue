<template>
	<div id="app">
		<div id="main" v-show="authenticated"></div>
		<div class="login-wrapper" v-if="!authenticated">
			<login-form/>
		</div>
	</div>
</template>

<script type="text/ecmascript-6">
	import Vue from 'vue'
	import $ from 'jquery'

	import loginForm from './components/auth/login-form.vue'

	import router from './router'

	export default{
		components: {loginForm},
		data(){
			return {
				authenticated: false
			}
		}
	}

</script>

<style rel="stylesheet/scss" lang="scss" scoped>
	@import 'resources/assets/sass/partials/_vars.scss';
	@import 'resources/assets/sass/partials/_mixins.scss';
	@import 'resources/assets/sass/partials/_shared.scss';
	#dragGhost {

		position: absolute;
		display: inline-block;
		background: $colorGreen;
		padding: .8rem;
		border-radius: .2rem;
		color: #fff;
		font-family: $fontFamily;
		font-size: 1rem;
		font-weight: $fontWeight_Thin;
		top: -100px;
		left: 0px;

		/**
		 * We can totally hide this element on touch devices, because there's
		 * no drag and drop support there anyway.
		 */
		html.touchevents & {
			display: none;
		}
	}

	#copyArea {
		position: absolute;
		left: -9999px;
		width: 1px;
		height: 1px;
		bottom: 1px;

		html.touchevents & {
			display: none;
		}
	}
	#main, .login-wrapper {
		display: flex;
		min-height: 100vh;
		flex-direction: column;

		background: $colorMainBgr;
		color: $colorMainText;

		font-family: $fontFamily;
		font-size: 1rem;
		line-height: 1.5rem;
		font-weight: $fontWeight_Thin;

		padding-bottom: $footerHeight;
	}

	.login-wrapper {
		@include vertical-center();
		padding-bottom: 0;
	}

</style>