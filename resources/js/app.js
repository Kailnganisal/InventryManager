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
import store from './store'
import 'vue-select/dist/vue-select.css'


axios.defaults.withCredentials = true
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'


createApp(App)
    .use(VueAxios, axios)
    .use(router)
    .use(Notifications)
    .use(store)
    .mount('#app')

