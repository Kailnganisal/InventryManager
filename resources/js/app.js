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


//const app = createApp(App)
createApp(App).use(router).use(VueAxios, axios).use(Notifications).mount('#app')
