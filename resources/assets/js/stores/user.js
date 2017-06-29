/**
 * Created by surprisepeas on 2017/6/10.
 */
import NProgress from 'nprogress'

import {http} from '../services'

export const userStore = {

	login(email, password){
		NProgress.start();
		return new Promise((resolve, reject) => {
			http.post('me', {email, password}, data => resolve(data), r => reject(r));
		})
	}
};