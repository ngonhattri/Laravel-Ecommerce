require('./bootstrap')
import Vue from 'vue';
import VueRouter from 'vue-router';
import {routes} from './routes';
import store from './store/index';
import MainApp from './components/Shared/HomeComponent.vue';

Vue.use(VueRouter);


const router = new VueRouter({
    routes,
    mode:'history'
});
const app = new Vue({
    el: '#app',
    router,
    store,
    components:{
        MainApp
    }
});
