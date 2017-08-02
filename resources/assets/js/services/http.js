/**
 * Created by surprisepeas on 2017/6/28.
 */

import axios from 'axios'
import NProgress from 'nprogress'
import {event} from '../utils'

export const http = {
    request (method, url, data, successCb = null, errorCb = null) {
        axios.request({
            url,
            data,
            method: method.toLowerCase()
        }).then(successCb).catch(errorCb);
    },

    post (url, data, successCb = null, errorCb = null){
        return this.request('post', url, data, successCb, errorCb);
    },

    get (url, successCb = null, errorCb = null) {
        return this.request('get', url, {}, successCb, errorCb)
    },

    put (url, data, successCb = null, errorCb = null) {
        return this.request('put', url, data, successCb, errorCb)
    },

    delete (url, data = {}, successCb = null, errorCb = null) {
        return this.request('delete', url, data, successCb, errorCb)
    },

    init () {
        axios.defaults.baseURL = '/api';

        // Http request 拦截器 注入token到Header
        axios.interceptors.request.use(config => {
            config.headers.Authorization = `Bearer ${ls.get('jwt-token')}`;
            return config;
        });

        // response 拦截器 保存token
        axios.interceptors.response.use(response => {
            NProgress.done();
            // 判断 response 是否存在token并保存
            const token = response.headers['Authorization'] || response.data['token'];
            if (token) {
                ls.set('jwt-token', token)
            }
            return response;
        }, error => {
            NProgress.done();
            // 如果response返回错误码的是错误请求或没有权限
            if (error.response.status === 400 || error.response.status === 401) {
                // 执行使token过期登出操作
                if (!error.config.method === 'post' && /\/api\/me\/?$/.test(error.config.url)) {
                    event.emit('logout');
                }
            }
            return Promise.reject(error);
        })
    }

};