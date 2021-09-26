//require('./bootstrap');
// app.use(VueAxios,axios)
//app.component('App', app)
//import './../css/index.css'
//import VueAxios from 'vue-axios'


import { createApp } from 'vue'
import App from './App.vue'
import router from "./router";
import axios from 'axios';
import VueAxios from "vue-axios";
import Notifications, {notify} from '@kyvg/vue3-notification'

axios.defaults.withCredentials = true
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'


//const app = createApp(App)
createApp(App).use(router).use(VueAxios, axios).use(Notifications).mount('#app')
// const app = createApp(App)
// app.config.globalProperties.$axios = axios;
// app.use(router)
// app.use(Notifications)
// app.mount('#app')
