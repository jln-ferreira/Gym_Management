require('./bootstrap');

import Vue from "vue";
import router from './routers';


// ------GOES TO BLADE.PHP------
Vue.component('welcome', require('./components/welcome_Page/welcome.vue').default);
Vue.component('main-component', require('./components/app/MainComponent.vue').default);

//get Authentication from Laravel to VUE JS
Vue.prototype.$userId = document.querySelector("meta[name='user_id']").getAttribute('content');
// ----------


const app = new Vue({
    el: '#app',
    components:{
    },
    router
});
