<template>
    <form @submit.prevent="login" :class="{ error: failed }">
        <input v-model="email" type="text" placeholder="example@gmail.cn" autofocus>
        <input v-model="password" type="password" placeholder="password for good">
        <button type="submit">Stitch</button>
    </form>
</template>

<script>
    import {userStore} from '../../stores'
    export default {
        data() {
            return {
                email: '',
                password: '',
                failed: false
            }
        },

        methods: {
            login(){
                this.failed = false;
                userStore.login(this.email, this.password);
                /*	.then(() => {
                 this.failed = false;
                 // 将值赋空, 避免下次密码出现
                 this.password = '';
                 event.emit('user.loggedin')
                 }).catch(() => {
                 this.failed = true
                 })*/
            }
        }
    }
</script>

<!--具有scoped属性的样式只会应用到当前元素和其子元素-->
<style scoped rel="stylesheet/scss" lang="scss">

    @import "../../../sass/partials/_vars.scss";
    @import "../../../sass/partials/_mixins.scss";
    @import "../../../sass/partials/_shared.scss";

    @keyframes shake {
        8%, 41% {
            -webkit-transform: translateX(-10px);
        }
        25%, 58% {
            -webkit-transform: translateX(10px);
        }
        75% {
            -webkit-transform: translateX(-5px);
        }
        92% {
            -webkit-transform: translateX(5px);
        }
        0%, 100% {
            -webkit-transform: translateX(0);
        }
    }

    /*表单样式*/
    form {
        width: 280px;
        padding: 1.8rem;
        background: rgba(255, 255, 255, .08);
        border-radius: .6rem;
        border: 1px solid #333;

        &.error {
            border-color: #8e4947;
            animation: shake .5s;
        }

        &::before {
            content: '';
            display: block;
            background: url("/public/img/logo.svg") center top no-repeat;
            background-size: 156px;
            height: 172px;
        }

    }

    input {
        display: block;
        margin-top: 12px;
        border: 0;
        background: #ffffff;
        outline: none;
        width: 100%;
    }

    button {
        display: block;
        margin-top: 12px;
        width: 100%;
    }

</style>