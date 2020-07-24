require('./bootstrap');

import Vue from "vue";
import router from './routers';


// ------GOES TO BLADE.PHP------
Vue.component('welcome', require('./components/welcome_Page/welcome.vue').default);
Vue.component('main-component', require('./components/app/MainComponent.vue').default);





const app = new Vue({
    el: '#app',
    components:{
    },
    router
});
