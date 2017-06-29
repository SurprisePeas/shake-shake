/**
 * Created by surprisepeas on 2017/6/28.
 */

import axios from 'axios'


export const http = {
	request (method, url, data, successCb = null, errorCb = null) {
		return axios({
			method,
			data,
			url: `/api/${url}`
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
};